<?php
// สมมติว่ามีการเก็บ user_id ไว้ใน session หลังจาก login แล้ว
$userId = $_SESSION['user_id'] ?? 0; 

if ($userId > 0) {
    $myEvents = getMyRegistrations($userId);
    renderView('my_events', [
        'myEvents' => $myEvents
    ]); //
} else {
    // ถ้ายังไม่ได้ login ให้กลับไปหน้าแรกหรือหน้า login
    header('Location: /');
    exit;
}