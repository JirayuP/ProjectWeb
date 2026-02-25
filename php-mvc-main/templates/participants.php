<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้สมัคร</title>
</head>
<body>
    <?php include 'header.php'; ?>
     <a href="/home">หน้าแรก</a> |
    <?php if (isset($data['mode']) && $data['mode'] === 'select_event'): ?>
        <h2>เลือกกิจกรรมที่ต้องการจัดการ</h2>
        <?php if (empty($data['events'])): ?>
            <p>คุณยังไม่ได้สร้างกิจกรรมใดๆ <a href="/create_event">สร้างกิจกรรมใหม่คลิกที่นี่</a></p>
        <?php else: ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ชื่อกิจกรรม</th>
                        <th>วันที่จัดงาน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['events'] as $event): ?>
                        <tr>
                            <td><?= htmlspecialchars($event['event_name']) ?></td>
                            <td><?= htmlspecialchars($event['start_date']) ?></td>
                           <td>
    <a href="/participants?event_id=<?= $event['event_id'] ?>">ดูผู้สมัคร</a> | 
    <a href="/checkin?event_id=<?= $event['event_id'] ?>" style="color: green;">เช็คชื่อเข้างาน</a> | 
    <a href="/edit_event?id=<?= $event['event_id'] ?>" style="color: orange;">แก้ไข</a> | 
    <a href="/delete_event?id=<?= $event['event_id'] ?>" onclick="return confirm('แน่ใจหรือไม่?')" style="color: red;">ลบ</a>
</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    <?php elseif (isset($data['mode']) && $data['mode'] === 'list_participants'): ?>
        <h2>รายชื่อผู้สมัครเข้าร่วมกิจกรรม</h2>
        <p><a href="/participants"><< ย้อนกลับไปเลือกกิจกรรมอื่น</a></p>

        <table border="1">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>ที่อยู่</th>
                    <th>วันที่ลงทะเบียน</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data['participants'])): ?>
                    <tr><td colspan="7">ยังไม่มีผู้สมัครในกิจกรรมนี้</td></tr>
                <?php else: ?>
                    <?php foreach ($data['participants'] as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['user_id']) ?></td>
                        <td><?= htmlspecialchars($p['firstname'] . ' ' . $p['lastname']) ?></td>
                        <td><?= htmlspecialchars($p['email']) ?></td>
                        <td><?= htmlspecialchars($p['province']) ?></td>
                        <td><?= htmlspecialchars($p['registered_at']) ?></td>
                        <td><strong><?= htmlspecialchars($p['status']) ?></strong></td>
                        <td>
                            <?php if ($p['status'] === 'pending'): ?>
                                <a href="/approve?id=<?= $p['registration_id'] ?>&status=approved&event_id=<?= $data['eventId'] ?>" 
                                   onclick="return confirm('ยืนยันการอนุมัติ?')" style="color: green;">อนุมัติ</a> | 
                                <a href="/approve?id=<?= $p['registration_id'] ?>&status=rejected&event_id=<?= $data['eventId'] ?>" 
                                   onclick="return confirm('ยืนยันการปฏิเสธ?')" style="color: red;">ปฏิเสธ</a>
                            <?php else: ?>
                                <span>ดำเนินการแล้ว (<?= htmlspecialchars($p['status']) ?>)</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
</body>
</html>