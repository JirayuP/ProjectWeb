<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้ขอเข้าร่วมกิจกรรม</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>รายชื่อผู้ขอเข้าร่วมกิจกรรม</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ชื่อผู้สมัคร</th>
                <th>กิจกรรม</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['participants'])): ?>
                <tr><td colspan="3">ยังไม่มีผู้สมัคร</td></tr>
            <?php else: ?>
                <?php foreach ($data['participants'] as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['user_name']) ?></td>
                        <td><?= htmlspecialchars($p['event_name']) ?></td>
                        <td><?= htmlspecialchars($p['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>6
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>