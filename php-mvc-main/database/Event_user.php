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
?>