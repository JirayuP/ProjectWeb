<html>

<head></head>

<body>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
    <?php include 'header.php'; ?>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->

    <!-- ส่วนแสดงผลหลักของหน้า -->
    
    <h1>ผลการค้นหาสำหรับ: <?= htmlspecialchars($data['keyword']) ?></h1>
    <?php if (empty($data['events'])): ?>
    <p>ไม่พบกิจกรรมที่ตรงตามเงื่อนไข</p>
<?php else: ?>
<?php foreach ($data['events'] as $event): ?>
    <div>
        <h3><?= htmlspecialchars($event['event_name']) ?></h3>
        <p><?= htmlspecialchars($event['event_date']) ?></p>
    </div>
<?php endforeach; ?>
<?php endif; ?>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
    <?php include 'footer.php'; ?>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
</body>

</html>