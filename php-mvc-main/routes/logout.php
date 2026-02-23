<?php
// เริ่มต้นการจัดการ Session (มี session_start() อยู่ใน index.php แล้ว)

// ล้างตัวแปร Session ทั้งหมด
$_SESSION = [];

// ทำลาย Session
session_destroy();

// ส่งผู้ใช้ออกไปที่หน้าแรกหรือหน้า Login
header('Location: /home');
exit;