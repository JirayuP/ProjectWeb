<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างกิจกรรม</title>
</head>
<body>
    <a href="/home">หน้าแรก</a> |
    <form action="/create_event" method="POST" enctype="multipart/form-data">
    <input type="text" name="event_name" placeholder="ชื่อกิจกรรม" required>
    <textarea name="description" placeholder="รายละเอียด"></textarea>
    <input type="datetime-local" name="start_date" required>
    <input type="datetime-local" name="end_date" required>
    <input type="text" name="location" placeholder="สถานที่">
    <input type="number" name="max_participants" placeholder="จำนวนคนสูงสุด">
    
    <input type="file" name="images[]" multiple accept="image/*"> 
    
    <button type="submit">สร้างกิจกรรม</button>
</form>
</body>
</html>