<?php

function searchEvent($keyword, $startDate, $endDate){
    // ดึงข้อมูลจาก database.php
$conn = getConnection(); 
    // คำสั่ง SQL 
$sql = "SELECT * FROM events WHERE event_name LIKE ? AND event_date BETWEEN ? AND ?";

$stmt = $conn->prepare($sql);
$searchTerm = "%$keyword%";

// กำหนดเงื่อนไขวันที่ 
$dateFrom = !empty($startDate) ? $startDate : '1000-01-01';
$dateTo = !empty($endDate) ? $endDate : '9999-12-31';

$stmt->bind_param("sss", $searchTerm, $dateFrom, $dateTo);
$stmt->execute();
$result = $stmt->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

return $events;
}
function getParticipants($eventId) {
$conn = getConnection(); 
    // SQL สำหรับ Join ตาราง เพื่อเอาชื่อคนและชื่อกิจกรรมมาแสดง
    $sql = "SELECT r.*, u.user_name, e.event_name 
            FROM registrations r
            JOIN users u ON r.user_id = u.id
            JOIN events e ON r.event_id = e.id
            WHERE r.event_id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_all(MYSQLI_ASSOC);
}