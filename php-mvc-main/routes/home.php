<?php
// ประมวลผลก่อนแสดงผลหน้า
$events = getAllEvents();

// 2. วนลูปเพื่อดึงรูปภาพของแต่ละกิจกรรมมาใส่ใน Array
if (function_exists('getEventImages')) {
    foreach ($events as $key => $event) {
        $events[$key]['images'] = getEventImages($event['event_id']);
    }
}

// 3. ส่งข้อมูลกิจกรรมไปที่หน้า View
renderView('home', [
    'title' => 'Welcome to Home Page',
    'events' => $events
]);