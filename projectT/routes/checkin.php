<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
    die("เฉพาะผู้จัดงานเท่านั้น");
}

$organizerId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'] ?? 0;
    $otpCode = trim($_POST['otp_code'] ?? ''); 
    
    if (verifyCheckInOTP($eventId, $otpCode, $organizerId)) {
        $data['success'] = "เช็คชื่อสำเร็จ (ผู้เข้าร่วมเข้างานได้)";
    } else {
        $data['error'] = "รหัส OTP ไม่ถูกต้อง หรือหมดอายุแล้ว";
    }
    $data['event_id'] = $eventId;
    renderView('checkin', $data);
} else {
    $eventId = $_GET['event_id'] ?? 0;
    renderView('checkin', ['event_id' => $eventId]);
}