<?php
// ดึงการเชื่อมต่อจากฐานข้อมูลที่กำหนดไว้ใน includes/database.php
$conn = getConnection(); 

$keyword = $_GET['keyword'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// สร้างคำสั่ง SQL 
// หากไม่ได้ระบุวันที่ ให้ตั้งค่าเริ่มต้นให้ครอบคลุมข้อมูลทั้งหมด
$sql = "SELECT * FROM events WHERE event_name LIKE ? AND event_date BETWEEN ? AND ?";

$stmt = $conn->prepare($sql);
$searchTerm = "%$keyword%";

// กำหนดเงื่อนไขวันที่ (ถ้าว่างให้ใช้ค่าเริ่มต้นที่กว้างมากๆ)
$dateFrom = !empty($start_date) ? $start_date : '1000-01-01';
$dateTo = !empty($end_date) ? $end_date : '9999-12-31';

$stmt->bind_param("sss", $searchTerm, $dateFrom, $dateTo);
$stmt->execute();
$result = $stmt->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

// ส่งข้อมูลไปที่หน้าแสดงผล
renderView('search', ['events' => $events]);