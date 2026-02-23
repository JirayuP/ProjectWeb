<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = loginUser($email, $password);

    if ($user) {
        // เก็บข้อมูลลงใน Session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['first_name'] = $user['firstname'];
        $_SESSION['last_name'] = $user['lastname'];
        
        header('Location: /home'); // ล็อกอินสำเร็จไปหน้าแรก
        exit;
    } else {
        echo "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }
} else {
    renderView('login'); // แสดงหน้าฟอร์ม Login
}