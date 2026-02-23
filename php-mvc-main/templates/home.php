<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบกิจกรรม</title>
</head>
<body>
        <?php include 'header.php'; ?>
<nav>
    <a href="/home">หน้าแรก</a> | 
    <?php if (isset($_SESSION['user_id'])): ?>
        <span>สวัสดี, <?= htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']) ?></span> |
        <a href="/my_events">กิจกรรมของฉัน</a> |
        <a href="/logout">ออกจากระบบ</a>
    <?php else: ?>
        <a href="/login">เข้าสู่ระบบ</a> |
        <a href="/register">สมัครสมาชิก</a>
    <?php endif; ?>
</nav>

<?php if (isset($_SESSION['user_id'])): ?>
    <main>
        <form action="/search" method="GET">
    <input type="text" name="keyword" placeholder="ชื่อกิจกรรม...">
    
    <label>ตั้งแต่วันที่:</label>
    <input type="date" name="start_date">
    
    <label>ถึงวันที่:</label>
    <input type="date" name="end_date">
    
    <button type="submit">ค้นหา</button>
</form>
    </main>
<?php endif; ?>
    

    
    <?php include 'footer.php'; ?>
</body>
</html>