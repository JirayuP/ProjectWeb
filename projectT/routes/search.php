<?php


$keyword = $_GET['keyword'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// ค้นหา
$events = searchEvent($keyword, $start_date, $end_date);

//  ดึงรูปภาพของแต่ละกิจกรรมมาเก็บไว้ใน Array
foreach ($events as $key => $event) {
    $events[$key]['images'] = getEventImages($event['event_id']);
}

//  ส่งข้อมูลไป templates/search
renderView('search', [
    'events' => $events,
    'keyword' => $keyword
]);