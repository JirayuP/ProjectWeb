<?php
// function ดึงข้อมูลกิจกรรมที่ผู้ใช้คนนี้ไปลงทะเบียนไว้
function getMyRegistrations($userId) {
    $conn = getConnection(); //
    
    // SQL สำหรับดึงข้อมูลกิจกรรมที่ผู้ใช้คนนี้ไปลงทะเบียนไว้
    $sql = "SELECT r.status, e.event_name, e.start_date , e.end_date
            FROM Registrations r
            JOIN Events e ON r.event_id = e.event_id
            WHERE r.user_id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
//function ลงทะเบียน
function registerUser($firstname, $lastname, $email, $password, $gender, $birthday, $province, $type = 'M' ) {
    $conn = getConnection(); 

    $check_email = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user) {
        return "email_exists";
    }
     //สุ่ม user_id
    $randomUserId = substr(str_shuffle("0123456789"), 0, 9);
    // ต่อ user_id
    $userId = $type . $randomUserId;
   
    
    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (user_id, firstname, lastname, email, password, gender, birthdate	, province) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $userId, $firstname, $lastname, $email, $hashedPassword, $gender, $birthday, $province);
    
    return $stmt->execute();
}
// function login
function loginUser($email, $password) {
    $conn = getConnection(); //
    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ตรวจสอบว่าพบผู้ใช้และรหัสผ่านถูกต้องหรือไม่
    if ($user && password_verify($password, $user['password'])) {
        return $user; 
    }
    return false;
}
// function change password
function changeUserPassword($userId, $oldPassword, $newPassword) {
    $conn = getConnection();

    // 1. ดึงรหัสผ่านปัจจุบันมาเช็ค
    $sql = "SELECT password FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // 2. ตรวจสอบรหัสผ่านเดิม
    if ($user && password_verify($oldPassword, $user['password'])) {
        // 3. Hash รหัสผ่านใหม่และอัปเดต
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET password = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $hashedPassword, $userId);
        
        return $updateStmt->execute();
    }
    
    return false;
}

//คำขอ ฝั่งผู้ใช้
function registerForEvent($userId, $eventId) {
    $conn = getConnection(); //

    // 1. ตรวจสอบก่อนว่าเคยสมัครกิจกรรมนี้ไปแล้วหรือยัง เพื่อป้องกันการสมัครซ้ำ
    $check = "SELECT registration_id FROM Registrations WHERE user_id = ? AND event_id = ?";
    $stmt_check = $conn->prepare($check);
    $stmt_check->bind_param("si", $userId, $eventId);
    $stmt_check->execute();
    if ($stmt_check->get_result()->fetch_assoc()) {
        return "already_registered";
    }

    // 2. บันทึกคำขอสมัคร (สถานะเริ่มต้นคือ pending)
    $sql = "INSERT INTO Registrations (user_id, event_id, status) VALUES (?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $userId, $eventId);
    
    return $stmt->execute();
}
?>