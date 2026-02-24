<!DOCTYPE html>
<html lang="en">
<body>
    <?php include 'header.php'; ?>
    <h2>แก้ไขกิจกรรม</h2>
    <form action="/edit_event" method="POST">
        <input type="hidden" name="event_id" value="<?= htmlspecialchars($data['event']['event_id']) ?>">
        
        <input type="text" name="event_name" value="<?= htmlspecialchars($data['event']['event_name']) ?>" required>
        <textarea name="description"><?= htmlspecialchars($data['event']['description']) ?></textarea>
        <input type="datetime-local" name="start_date" value="<?= htmlspecialchars($data['event']['start_date']) ?>" required>
        <input type="datetime-local" name="end_date" value="<?= htmlspecialchars($data['event']['end_date']) ?>" required>
        <input type="text" name="location" value="<?= htmlspecialchars($data['event']['location']) ?>">
        <input type="number" name="max_participants" value="<?= htmlspecialchars($data['event']['max_participants']) ?>">
        
        <button type="submit">บันทึกการแก้ไข</button>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>