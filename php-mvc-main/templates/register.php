<!DOCTYPE html>
<html lang="en">
<body>
    <?php include 'header.php'; ?>
    <h1>สมัครสมาชิก</h1>
    <form action="/register" method="POST">
        <div>
            <label>ชื่อ:</label>
            <input type="text" name="firstname" required>
        </div>
        <div>
            <label>นามสกุล:</label>
            <input type="text" name="lastname" required>
        </div>
        <div>
            <label>อีเมล:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>รหัสผ่าน:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">ยืนยันการสมัคร</button>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>