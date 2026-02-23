<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name   = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (registerUser($first_name, $last_name, $email, $password)) {
        // เมื่อสมัครสำเร็จ ให้ส่งไปหน้า login หรือหน้าแรก
        header('Location: /home');
        exit;
    } else {
        echo "การลงทะเบียนล้มเหลว กรุณาลองใหม่";
    }
} else {
    // แสดงหน้าฟอร์มสมัครสมาชิก
    renderView('register'); //
}