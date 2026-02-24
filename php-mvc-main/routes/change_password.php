<?php
// ไฟล์: pro/php-mvc-main/routes/change_password.php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $oldPass = $_POST['old_password'] ?? '';
    $newPass = $_POST['new_password'] ?? '';
    $confirmPass = $_POST['confirm_password'] ?? '';

    if ($newPass !== $confirmPass) {
        renderView('change_password', ['error' => 'รหัสผ่านใหม่ไม่ตรงกัน']);
    } else {
        $result = changeUserPassword($userId, $oldPass, $newPass);
        if ($result) {
            renderView('change_password', ['success' => 'เปลี่ยนรหัสผ่านสำเร็จแล้ว']);
        } else {
            renderView('change_password', ['error' => 'รหัสผ่านเดิมไม่ถูกต้อง']);
        }
    }
} else {
    renderView('change_password');
}