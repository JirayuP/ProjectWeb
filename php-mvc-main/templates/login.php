<!DOCTYPE html>
<html lang="en">
<body>
    <?php include 'header.php'; ?>
    <h1>เข้าสู่ระบบ</h1>
    <form action="/login" method="POST">
        <div>
            <label>อีเมล:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>รหัสผ่าน:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">เข้าสู่ระบบ</button>
    </form>
    <p>ยังไม่เป็นสมาชิก? <a href="/register">สมัครสมาชิกที่นี่</a></p>
    <?php include 'footer.php'; ?>
</body>
</html>