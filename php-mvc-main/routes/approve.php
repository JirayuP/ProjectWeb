<?php

// ตรวจสอบสิทธิ์ว่าเป็น Organizer (ID ขึ้นต้นด้วย O)
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
    die("เข้าถึงสิทธิ์ไม่ได้");
}

$registrationId = $_GET['id'] ?? 0;
$status = $_GET['status'] ?? '';
$eventId = $_GET['event_id'] ?? 0; // เพื่อใช้ในการส่งกลับไปหน้าเดิม

if ($registrationId && $status) {
    if (updateRegistrationStatus($registrationId, $status)) {
        // เมื่อสำเร็จ ให้ส่งกลับไปหน้าเดิมพร้อมรหัสกิจกรรม
        header("Location: /participants?event_id=" . $eventId);
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะ";
    }
}