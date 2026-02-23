<?php
function getMyRegistrations($userId) {
    $conn = getConnection(); //
    
    // SQL สำหรับดึงข้อมูลกิจกรรมที่ผู้ใช้คนนี้ไปลงทะเบียนไว้
    $sql = "SELECT r.status, e.event_name, e.event_date 
            FROM registrations r
            JOIN events e ON r.event_id = e.id
            WHERE r.user_id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
function registerUser($firstname, $lastname, $email, $password) {
    $conn = getConnection(); //
    //สุ่ม user_id
    $randomUserId = substr(str_shuffle("0123456789"), 0, 10);
    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (user_id, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $randomUserId, $firstname, $lastname, $email, $hashedPassword);
    
    return $stmt->execute();
}
function loginUser($email, $password) {
    $conn = getConnection(); //
    
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ตรวจสอบว่าพบผู้ใช้และรหัสผ่านถูกต้องหรือไม่
    if ($user && password_verify($password, $user['password'])) {
        return $user; // ส่งข้อมูลผู้ใช้กลับไป
    }
    return false;
}
?>