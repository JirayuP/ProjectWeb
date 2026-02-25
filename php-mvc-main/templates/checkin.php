<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เช็คชื่อเข้างาน</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>ตรวจสอบรหัส OTP เข้างาน</h2>
    <a href="/home">หน้าแรก</a> |
    <p><a href="/participants"><< กลับหน้าจัดการผู้สมัคร</a></p>

    <?php if(isset($data['error'])): ?>
        <h3 style="color: red;"><?= htmlspecialchars($data['error']) ?></h3>
    <?php endif; ?>
    <?php if(isset($data['success'])): ?>
        <h3 style="color: green;"><?= htmlspecialchars($data['success']) ?></h3>
    <?php endif; ?>

    <form action="/checkin" method="POST">
        <input type="hidden" name="event_id" value="<?= htmlspecialchars($data['event_id'] ?? '') ?>">
        <div>
            <label>กรอกรหัส OTP 6 หลักที่ผู้เข้าร่วมแสดง:</label><br><br>
            <input type="text" name="otp_code" required maxlength="6" style="font-size: 24px; letter-spacing: 5px; width: 200px; text-align: center;">
        </div>
        <br>
        <button type="submit" style="padding: 10px 20px;">ยืนยันการเข้างาน</button>
    </form>
    
    <?php include 'footer.php'; ?>
</body>
</html>