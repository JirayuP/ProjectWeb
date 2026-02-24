<!DOCTYPE html>
<html lang="en">
<body>
    <?php include 'header.php'; ?>
    <h1>เปลี่ยนรหัสผ่าน</h1>

    <?php if(isset($data['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>

    <?php if(isset($data['success'])): ?>
        <p style="color: green;"><?= htmlspecialchars($data['success']) ?></p>
    <?php endif; ?>

    <form action="/change_password" method="POST">
        <div>
            <label>รหัสผ่านเดิม:</label>
            <input type="password" name="old_password" required>
        </div>
        <div>
            <label>รหัสผ่านใหม่:</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>ยืนยันรหัสผ่านใหม่:</label>
            <input type="password" name="confirm_password" required>
        </div>
        <button type="submit">บันทึกการเปลี่ยนแปลง</button>
    </form>

    <p><a href="/home">กลับหน้าหลัก</a></p>
    <?php include 'footer.php'; ?>
</body>
</html>