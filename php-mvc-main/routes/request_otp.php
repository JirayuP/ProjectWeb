<?php
// ไฟล์: routes/request_otp.php
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'M') {
    die("เฉพาะผู้เข้าร่วมเท่านั้น");
}

$eventId = $_GET['event_id'] ?? 0;
$userId = $_SESSION['user_id'];

if ($eventId) {
    generateUserOTP($userId, $eventId);
}
// กลับไปหน้ากิจกรรมของฉัน
header('Location: /my_events');
exit;