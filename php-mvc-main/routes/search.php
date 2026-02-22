<?php

$keyword = $_GET['keyword'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

$events = searchEvent($keyword, $start_date, $end_date);

// ส่งข้อมูลไป View
renderView('search', ['events' => $events]);