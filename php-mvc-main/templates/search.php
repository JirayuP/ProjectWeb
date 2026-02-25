<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหากิจกรรม</title>
</head>
<body>
<?php include 'header.php'; ?>

<h1>ผลการค้นหาสำหรับ: <?= htmlspecialchars($data['keyword'] ?? '') ?></h1>
<a href="/home">หน้าแรก</a> |
<?php if (empty($data['events'])): ?>
    <div style="color: gray; text-align: center; margin-top: 20px;">
        <p>ไม่พบกิจกรรมที่ตรงตามเงื่อนไขที่คุณค้นหา</p>
    </div>
<?php else: ?>
    <div class="event-list">
        <?php foreach ($data['events'] as $event): ?>
            <div style="border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">
    <h3><?= htmlspecialchars($event['event_name']) ?></h3>
    
    <?php if (!empty($event['images'])): ?>
        <div style="margin: 10px 0;">
            <?php foreach ($event['images'] as $image): ?>
                <img src="/<?= htmlspecialchars($image['image_path']) ?>" 
                     alt="Event Image" 
                     style="max-width: 200px; max-height: 150px; margin-right: 10px; border-radius: 5px; object-fit: cover;">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <p><strong>รายละเอียด:</strong> <?= htmlspecialchars($event['description']) ?></p>
    <p><strong>ช่วงเวลา:</strong> <?= htmlspecialchars($event['start_date']) ?> - <?= htmlspecialchars($event['end_date']) ?></p>
    <p><strong>สถานที่:</strong> <?= htmlspecialchars($event['location'] ?? 'ไม่ได้ระบุ') ?></p>
    <p><strong>จำนวนผู้เข้าร่วมสูงสุด:</strong> <?= htmlspecialchars($event['max_participants']) ?> คน</p>


                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] === 'M'): ?>
                    <br>
                    <a href="/join_event?event_id=<?= $event['event_id'] ?>" 
                       onclick="return confirm('ยืนยันการส่งคำขอเข้าร่วมกิจกรรม?')" 
                       style="padding: 10px; background: blue; color: white; text-decoration: none; display: inline-block;">
                       ส่งคำขอเข้าร่วมกิจกรรม
                    </a>
                <?php elseif (!isset($_SESSION['user_id'])): ?>
                    <p><a href="/login" style="color: red;">กรุณาเข้าสู่ระบบเพื่อสมัครกิจกรรม</a></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?> 
        </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
</body>
</html>