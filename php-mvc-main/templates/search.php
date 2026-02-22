<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหากิจกรรมห</title>
</head>
<body>
    
    <?php include 'header.php'; ?>
    
    <h1>ผลการค้นหาสำหรับ: <?= htmlspecialchars($data['keyword']) ?></h1>
    <?php if (empty($data['events']   )): ?>
    <p>ไม่พบกิจกรรมที่ตรงตามเงื่อนไข</p>
<?php else: ?>
<?php foreach ($data['events'] as $event): ?>
    <div>
        <h3><?= htmlspecialchars($event['event_name']) ?></h3>
        <p><?= htmlspecialchars($event['event_date']) ?></p>
        <a href="/participants?event_id=<?= $event['id'] ?>">ดูรายชื่อผู้เข้าร่วม</a>
    </div>
<?php endforeach; ?>
<?php endif; ?>
    <?php include 'footer.php'; ?>
</body>
</html>