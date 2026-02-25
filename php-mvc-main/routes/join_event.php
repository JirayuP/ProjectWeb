<?php

// ตรวจสอบว่าเป็นสมาชิกทั่วไป (ID ขึ้นต้นด้วย M)
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'M') {
    die("เฉพาะสมาชิกทั่วไปเท่านั้นที่สามารถสมัครกิจกรรมได้");
}

$eventId = $_GET['event_id'] ?? 0;
$userId = $_SESSION['user_id'];

if ($eventId) {
    $result = registerForEvent($userId, $eventId);
    
    if ($result === true) {
        // สมัครสำเร็จ ส่งไปหน้ากิจกรรมของฉัน (ข้อ 3.3)
        header('Location: /my_events?success=1');
        exit;
    } elseif ($result === "already_registered") {
        header('Location: /home?error=already');
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการส่งคำขอ";
    }
}

?>