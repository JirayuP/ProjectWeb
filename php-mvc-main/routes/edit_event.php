<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
    die("คุณไม่มีสิทธิ์แก้ไขกิจกรรม");
}

$organizerId = $_SESSION['user_id'];
$eventId = $_GET['id'] ?? ($_POST['event_id'] ?? 0);

// กรณีส่งฟอร์มแก้ไขเข้ามา (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['event_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $startDate = $_POST['start_date'] ?? '';
    $endDate = $_POST['end_date'] ?? '';
    $location = $_POST['location'] ?? '';
    $maxParticipants = $_POST['max_participants'] ?? 0;

    if (updateEvent($eventId, $eventName, $description, $startDate, $endDate, $location, $maxParticipants, $organizerId)) {
        header("Location: /participants"); // กลับไปหน้าเลือกกิจกรรม
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไข";
    }
}

// กรณีโหลดหน้าเว็บ (GET) ให้ดึงข้อมูลเดิมมาแสดงใน View
$event = getEventById($eventId, $organizerId);
if (!$event) {
    die("ไม่พบกิจกรรมนี้");
}
renderView('edit_event', ['event' => $event]);