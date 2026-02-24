<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name   = $_POST['firstname'] ?? '';
    $last_name = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $address = $_POST['address'] ?? '';
     
    $result = registerUser($first_name, $last_name, $email, $password, $gender, $birthday, $address,'M');

    if($result === true) {
         // เมื่อสมัครสำเร็จ ให้ส่งไปหน้า login หรือหน้าแรก
        header('Location: /home');
        exit;
    }
    elseif ($result === "email_exists") {
        renderView('register',['error' => 'อีเมลนี้มีผู้ใช้แล้ว']);
       
    } 
    else{
        renderView('register',['error' => 'การลงทะเบียนล้มเหลว กรุณาลองใหม่']);
    }
} else {
    // แสดงหน้าฟอร์มสมัครสมาชิก
    renderView('register'); //
}