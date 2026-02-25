<?php

declare(strict_types=1);


session_start();

// กำหนดโซนเวลาเป็นกรุงเทพมหานคร
date_default_timezone_set('Asia/Bangkok');

// กำหนดค่าคงที่สำหรับไดเรกทอรีต่างๆ ในโปรเจค
const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTE_DIR = __DIR__ . '/../routes';
const TEMPLATES_DIR = __DIR__ . '/../templates';
const DATABASES_DIR = __DIR__ . '/../database';

// รวมไฟล์ที่จำเป็น เข้ามาใช้งานใน index.php
require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/database.php';





// ทุกครั้งที่มีการร้องขอเข้ามา ให้เรียกใช้ฟังก์ชัน dispatch
dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// ควบคุมการเข้าถึงหน้าเว็บด้วย session (ตัวอย่างการใช้งาน)
// const PUBLIC_ROUTES = ['/', '/login'];

// if (in_array(strtolower($_SERVER['REQUEST_URI']), PUBLIC_ROUTES)) {
//     dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
//     exit;
// } elseif (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] < 10) {
//     // 10 Sec.
//     $unix_timestamp = time();
//     $_SESSION['timestamp'] = $unix_timestamp;
//     dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
// } else {
//     unset($_SESSION['timestamp']);
//     header('Location: /');
//     exit;
// }