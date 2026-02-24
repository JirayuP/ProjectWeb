<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการเข้าร่วมกิจกรรมของฉัน</title>
</head>
<body>
       <?php include 'header.php'; ?>
    <h1>ประวัติการเข้าร่วมกิจกรรมของฉัน</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ชื่อกิจกรรม</th>
                <th>วันที่จัดงาน</th>
                <th>สถานะการเข้าร่วม</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['myEvents'])): ?>
                <tr><td colspan="3">คุณยังไม่มีประวัติการลงทะเบียนกิจกรรม</td></tr>
            <?php else: ?>
                <?php foreach ($data['myEvents'] as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['event_name']) ?></td>
                        <td><?= htmlspecialchars($event['start_date']) ?></td>
                        <td><?= htmlspecialchars($event['end_date']) ?></td>
                        <td>
                            <?php 
                                // แสดงข้อความตามสถานะ
                                if ($event['status'] == 'pending') echo "รอการอนุมัติ";
                                elseif ($event['status'] == 'approved') echo "เข้าร่วมแล้ว/อนุมัติ";
                                elseif ($event['status'] == 'rejected') echo "ถูกปฏิเสธ";
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>