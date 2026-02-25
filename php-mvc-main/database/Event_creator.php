<?php
function searchEvent($keyword, $startDate, $endDate)
{
    $conn = getConnection(); 
    
    // ลอจิก: กิจกรรมต้องเริ่มก่อน(หรือใน)วันที่สิ้นสุด และต้องจบหลัง(หรือใน)วันที่เริ่มต้น
    $sql = "SELECT * FROM events 
            WHERE event_name LIKE ? 
            AND start_date <= ? 
            AND end_date >= ?";

    $stmt = $conn->prepare($sql);
    $searchTerm = "%$keyword%";

    // กำหนดค่าเริ่มต้นถ้าว่าง และเพิ่มเวลาเพื่อให้ครอบคลุมทั้งวัน
    $dateFrom = !empty($startDate) ? $startDate : '1000-01-01';
    $dateTo = !empty($endDate) ? $endDate : '9999-12-31';

    
    $stmt->bind_param("sss", $searchTerm, $dateTo, $dateFrom);
    
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getParticipantsByEvent($eventId, $organizerId) {
    $conn = getConnection();

    // ดึงข้อมูลผู้สมัครพร้อมรายละเอียดส่วนตัว โดยเช็คว่ากิจกรรมนั้นเป็นของ Organizer คนนี้จริงหรือไม่
    $sql = "SELECT r.registration_id, r.status, r.registered_at, 
                   u.user_id, u.firstname, u.lastname, u.email, u.gender, u.province
            FROM Registrations r
            JOIN Users u ON r.user_id = u.user_id
            JOIN Events e ON r.event_id = e.event_id
            WHERE r.event_id = ? AND e.organizer_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $eventId, $organizerId); // event_id เป็น int, organizer_id เป็น string (O...)
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
//สร้างกิจกรรม
function createEvent($eventName, $description, $startDate, $endDate, $location, $maxParticipants, $organizerId, $imagePaths) {
    $conn = getConnection();

    // 1. บันทึกข้อมูลกิจกรรมลงตาราง Events
    $sql = "INSERT INTO Events (event_name, description, start_date, end_date, location, max_participants, organizer_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $eventName, $description, $startDate, $endDate, $location, $maxParticipants, $organizerId);
    
    if ($stmt->execute()) {
        $eventId = $conn->insert_id; // ดึง ID กิจกรรมที่เพิ่งสร้าง

        // 2. บันทึกรูปภาพ (รองรับมากกว่า 1 รูปตามข้อ 2.1)
        foreach ($imagePaths as $path) {
            $imgSql = "INSERT INTO Event_Images (event_id, image_path) VALUES (?, ?)";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("is", $eventId, $path);
            $imgStmt->execute();
        }
        return true;
    }
    return false;
}

//อัปเดตสถานะ
function updateRegistrationStatus($registrationId, $status) {
    $conn = getConnection(); //
    
    // ตรวจสอบว่าสถานะที่ส่งมาเป็นค่าที่อนุญาต (Approved หรือ Rejected)
    $allowedStatuses = ['approved', 'rejected', 'pending'];
    if (!in_array($status, $allowedStatuses)) {
        return false;
    }

    $sql = "UPDATE Registrations SET status = ? WHERE registration_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $registrationId);
    
    return $stmt->execute();
}

// ดึงกิจกรรมของผู้สร้าง
function getEventsByOrganizer($organizerId) {
    $conn = getConnection();
    $sql = "SELECT event_id, event_name, start_date, end_date FROM Events WHERE organizer_id = ? ORDER BY start_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $organizerId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// ดึงข้อมูลกิจกรรมมาแก้ไข
function getEventById($eventId, $organizerId) {
    $conn = getConnection();
    $sql = "SELECT * FROM Events WHERE event_id = ? AND organizer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $eventId, $organizerId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// อัปเดตข้อมูลกิจกรรม
function updateEvent($eventId, $eventName, $description, $startDate, $endDate, $location, $maxParticipants, $organizerId) {
    $conn = getConnection();
    $sql = "UPDATE Events SET event_name=?, description=?, start_date=?, end_date=?, location=?, max_participants=? 
            WHERE event_id=? AND organizer_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiis", $eventName, $description, $startDate, $endDate, $location, $maxParticipants, $eventId, $organizerId);
    return $stmt->execute();
}

// ลบกิจกรรม
function deleteEvent($eventId, $organizerId) {
    $conn = getConnection();
    
    // 1. ลบรูปภาพที่เกี่ยวข้องใน Event_Images ก่อน
    $sqlImg = "DELETE FROM Event_Images WHERE event_id = ?";
    $stmtImg = $conn->prepare($sqlImg);
    $stmtImg->bind_param("i", $eventId);
    $stmtImg->execute();

    // 2. ลบประวัติการสมัครใน Registrations ก่อน
    $sqlReg = "DELETE FROM Registrations WHERE event_id = ?";
    $stmtReg = $conn->prepare($sqlReg);
    $stmtReg->bind_param("i", $eventId);
    $stmtReg->execute();

    // 3. ลบตัวกิจกรรมใน Events เป็นลำดับสุดท้าย
    $sql = "DELETE FROM Events WHERE event_id = ? AND organizer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $eventId, $organizerId);
    return $stmt->execute();
}

//ดึงภาพกิจกรรม
function getEventImages($eventId) {
    $conn = getConnection();
    $sql = "SELECT * FROM Event_Images WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

//ดึงกิจกรรมทั้งหมด
function getAllEvents() {
    $conn = getConnection();
    // ดึงกิจกรรมทั้งหมด เรียงตามวันที่เริ่มกิจกรรมจากใกล้ไปไกล
    $sql = "SELECT * FROM Events ORDER BY start_date ASC"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>