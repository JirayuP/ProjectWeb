<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ตรวจสอบว่าเป็นผู้สร้างกิจกรรม (ID ขึ้นต้นด้วย O)
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'][0] !== 'O') {
        die("คุณไม่มีสิทธิ์สร้างกิจกรรม");
    }

    $eventName = $_POST['event_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $startDate = $_POST['start_date'] ?? '';
    $endDate = $_POST['end_date'] ?? '';
    $location = $_POST['location'] ?? '';
    $maxParticipants = $_POST['max_participants'] ?? 0;
    $organizerId = $_SESSION['user_id'];

    // อัปโหลดรูปภาพ
    $imagePaths = [];
    if (!empty($_FILES['images']['name'][0])) {
        $uploadDir = __DIR__ . '/../public/uploads/';
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            if ($_FILES['images']['error'][$key] !== UPLOAD_ERR_OK) continue;
            $fileName = time() . "_" . basename($_FILES['images']['name'][$key]);
            if (move_uploaded_file($tmpName, $uploadDir . $fileName)) {
                $imagePaths[] = "uploads/" . $fileName;
            }
        }
    }

    if (createEvent($eventName, $description, $startDate, $endDate, $location, $maxParticipants, $organizerId, $imagePaths)) {
        header('Location: /home');
        exit;
    }
}
renderView('create_event');
?>