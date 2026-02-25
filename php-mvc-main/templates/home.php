<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกิจกรรม</title>
</head>
<body>
        <?php include 'header.php'; ?>

        <?php
// ตรวจสอบตัวแรกของ ID ว่าเป็น 'O' (Organizer) หรือไม่
$isOrganizer = (isset($_SESSION['user_id']) && $_SESSION['user_id'][0] === 'O');
?>
<nav>
    <a href="/home">หน้าแรก</a> | 
    <?php if (isset($_SESSION['user_id'])): ?>
        <?php if ($isOrganizer): ?>
            <a href="/create_event" > สร้างกิจกรรม</a> |
            <a href="/participants">จัดการผู้สมัคร</a> |
        <?php endif; ?>
        <a href="/my_events">กิจกรรมของฉัน</a>
        <a href="/my_events">กิจกรรม</a> |
        <a href="/logout">ออกจากระบบ</a>
        <a href="/change_password">เปลี่ยนรหัสผ่าน</a>
    <?php else: ?>
        <a href="/login">เข้าสู่ระบบ</a> |
        <a href="/register">สมัครสมาชิก</a>
    <?php endif; ?>
</nav>

<?php if (isset($_SESSION['user_id'])): ?>
    <main>
        <form action="/search" method="GET">
            <input type="text" name="keyword" placeholder="ชื่อกิจกรรม...">
            <label>ตั้งแต่วันที่:</label> <input type="date" name="start_date">
            <label>ถึงวันที่:</label> <input type="date" name="end_date">
            <button type="submit">ค้นหา</button>
        </form>
        
        <hr style="margin: 20px 0;">
        
        <h2>กิจกรรมที่เปิดรับสมัคร</h2>
        <div class="event-list">
            <?php if (empty($data['events'])): ?>
                <p>ยังไม่มีกิจกรรมในขณะนี้</p>
            <?php else: ?>
                <?php foreach ($data['events'] as $event): ?>
                    <div style="border: 1px solid #ccc; margin-bottom: 20px; padding: 15px; border-radius: 8px;">
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
                               style="padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; display: inline-block;">
                               ลงทะเบียนเข้าร่วม
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
<?php endif; ?>
    

    
    <?php include 'footer.php'; ?>
</body>
</html>