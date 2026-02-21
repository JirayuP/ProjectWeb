<html>

<head></head>

<body>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
    <?php include 'header.php'; ?>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->

    <!-- ส่วนแสดงผลหลักของหน้า -->
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
    <!-- ส่วนแสดงผลหลักของหน้า -->

    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
    <?php include 'footer.php'; ?>
    <!-- Header และ Footer อาจแยกออกเป็นไฟล์แยกต่างหากได้ -->
</body>

</html>