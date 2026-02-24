<?php
// ตรวจสอบว่าเป็นผู้สร้าง (Organizer)
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
    die("คุณไม่มีสิทธิ์ลบกิจกรรม");
}

$eventId = $_GET['id'] ?? 0;
$organizerId = $_SESSION['user_id'];

if ($eventId) {
    deleteEvent($eventId, $organizerId);
}
// ลบเสร็จให้กลับไปหน้าเลือกกิจกรรม (คุณสามารถเปลี่ยนเส้นทางที่เหมาะสมได้)
header("Location: /participants"); 
exit;