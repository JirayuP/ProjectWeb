<?php
// ไฟล์ pro/php-mvc-main/routes/search.php

$keyword = $_GET['keyword'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// 1. ดึงข้อมูลกิจกรรมมาตามปกติ
$events = searchEvent($keyword, $start_date, $end_date);

// 2. วนลูปเพื่อดึงรูปภาพของแต่ละกิจกรรมมาเก็บไว้ใน Array
foreach ($events as $key => $event) {
    $events[$key]['images'] = getEventImages($event['event_id']);
}

// 3. ส่งข้อมูลไป View
renderView('search', [
    'events' => $events,
    'keyword' => $keyword
]);