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
            <label>เพศ:</label>
            <select name="gender" required>
        <option value="">-- เลือกเพศ --</option>
        <option value="male">ชาย</option>
        <option value="female">หญิง</option>
        <option value="other">อื่นๆ</option>
    </select>
        </div>
        <div>
            <label>วันเกิด</label>
            <input type="date" name="birthday" required>
        </div>
        
        <div>
            <label>อีเมล:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>รหัสผ่าน:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>ที่อยู่:</label>
            <input type="text" name="address" required>
        </div>
        <button type="submit">ยืนยันการสมัคร</button>
    </form>
    <?php if(isset($data['error'])): ?>
       <script>
        alert("<?= htmlspecialchars($data['error']) ?>");
    </script>  
    <?php endif; ?>
    <?php include 'footer.php'; ?>
</body>
</html>