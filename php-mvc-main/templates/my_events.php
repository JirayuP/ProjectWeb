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
    <a href="/home">หน้าแรก</a> |
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
                <tr><td colspan="4">คุณยังไม่มีประวัติการลงทะเบียนกิจกรรม</td></tr>
            <?php else: ?>
                <?php foreach ($data['myEvents'] as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['event_name']) ?></td>
                        <td><?= htmlspecialchars($event['start_date']) ?></td>
                        <td>
                            <?php 
                                if ($event['status'] == 'pending') echo "รอการอนุมัติ";
                                elseif ($event['status'] == 'approved') echo "<span style='color:green;'>อนุมัติแล้ว</span>";
                                elseif ($event['status'] == 'rejected') echo "<span style='color:red;'>ถูกปฏิเสธ</span>";
                            ?>
                        </td>
                        <td>
                            <?php if ($event['status'] == 'approved'): ?>
                                <?php if ($event['check_in_status'] == 'Checked-in'): ?>
                                    <strong style="color:blue;">เข้างานแล้ว</strong>
                                <?php else: ?>
                                    <?php 
                                        $now = date('Y-m-d H:i:s');
                                        // เช็คว่ามี OTP และยังไม่หมดเวลา
                                        if (!empty($event['otp_code']) && $event['otp_expire_time'] > $now): 
                                    ?>
                                        <div style="background:#eee; padding:5px; text-align:center;">
                                            รหัสเข้างาน: <strong style="font-size:20px;"><?= $event['otp_code'] ?></strong><br>
                                            <small style="color:red;">หมดอายุ: <?= $event['otp_expire_time'] ?></small>
                                        </div>
                                    <?php else: ?>
                                        <a href="/request_otp?event_id=<?= $event['event_id'] ?>" style="padding: 5px; background: orange; color: white; text-decoration: none;">ขอรหัสเข้างาน (OTP)</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>