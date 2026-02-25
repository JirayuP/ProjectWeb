<?php
// ตรวจสอบว่าล็อกอินหรือยัง
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

$userId = $_SESSION['user_id'];

$user = getUserById($userId);
if (!$user) {
    die("ไม่พบข้อมูลผู้ใช้");
}

renderView('profile', ['user' => $user]); //