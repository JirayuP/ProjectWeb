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
    <a href="/my_events">กิจกรรมของฉัน</a>
</nav>

    
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
    

    
    <?php include 'footer.php'; ?>
</body>
</html>