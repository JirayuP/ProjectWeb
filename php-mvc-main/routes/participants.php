<?php
// ไฟล์: pro/php-mvc-main/routes/participants.php

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
    die("เฉพาะผู้สร้างกิจกรรมเท่านั้นที่เข้าถึงหน้านี้ได้");
}

$organizerId = $_SESSION['user_id'];
$eventId = $_GET['event_id'] ?? null; // ใช้ null เพื่อเช็คว่ามีค่าส่งมาไหม

if ($eventId) {
    // กรณีที่ 1: เลือกกิจกรรมแล้ว -> ให้แสดงรายชื่อคนสมัคร (Logic เดิม)
    $participants = getParticipantsByEvent($eventId, $organizerId);
    
    // ส่ง eventId ไปด้วย เพื่อใช้ในปุ่มอนุมัติ/ปฏิเสธ
    renderView('participants', [
        'mode' => 'list_participants',
        'participants' => $participants,
        'eventId' => $eventId 
    ]);
} else {
    // กรณีที่ 2: ยังไม่เลือกกิจกรรม -> ให้ดึงรายชื่อกิจกรรมมาให้เลือก (Logic ใหม่)
    $events = getEventsByOrganizer($organizerId);
    renderView('participants', [
        'mode' => 'select_event',
        'events' => $events
    ]);
}
?>