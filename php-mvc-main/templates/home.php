<html>

<head></head>

<body>
    
    <?php include 'header.php'; ?>
    

    
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