<?php
require_once 'db_config.php';

// Check if student is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
}

if ($_SESSION['role'] !== 'student') {
   header('location: ../login.php');
}

$userId = $_SESSION['user_id'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];
    
    // Combine date and time
    $startDateTime = date('Y-m-d H:i:s', strtotime("$date $startTime"));
    $endDateTime = date('Y-m-d H:i:s', strtotime("$date $endTime"));
    
    // Validate time slot (minimum 30 minutes)
    if (strtotime($endDateTime) - strtotime($startDateTime) < 1800) {
        $error = "Time slot must be at least 30 minutes";
    } else {
        // Check for overlapping slots
        $stmt = $conn->prepare("
    SELECT id FROM time_slots 
    WHERE user_id = ? 
    AND (
        (start_time < ? AND end_time > ?) OR
        (start_time < ? AND end_time > ?) OR
        (start_time >= ? AND end_time <= ?)
    )
");

        $stmt->bind_param("issssss", $userId, $endDateTime, $startDateTime, $startDateTime, $endDateTime, $startDateTime, $endDateTime);

        $stmt->execute();
        
        if ($stmt->get_result()->num_rows > 0) {
            $error = "Time slot overlaps with existing slot";
        } else {
            // Add the slot
            $stmt = $conn->prepare("INSERT INTO time_slots (user_id, start_time, end_time) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $userId, $startDateTime, $endDateTime);
            
            if ($stmt->execute()) {
                header('location: view_slots.php');
            } else {
                $error = "Failed to add time slot";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Time Slot</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .error { color: red; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 8px 16px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-secondary { background: #6c757d; }
    </style>
</head>
<body>
    <h1>Add Time Slot</h1>
    
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required 
                   min="<?= date('Y-m-d') ?>" 
                   value="<?= date('Y-m-d') ?>">
        </div>
        
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" required 
                   min="08:00" max="20:00" value="09:00">
        </div>
        
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" required 
                   min="08:30" max="21:00" value="09:30">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn">Add Slot</button>
            <a href="view_slots.php" class="btn-secondary">Cancel</a>
        </div>
    </form>
    
    <script>
        document.getElementById('start_time').addEventListener('change', function() {
            const startTime = this.value;
            if (startTime) {
                const [hours, minutes] = startTime.split(':');
                const endTime = new Date();
                endTime.setHours(parseInt(hours));
                endTime.setMinutes(parseInt(minutes) + 30);
                
                const endHours = endTime.getHours().toString().padStart(2, '0');
                const endMinutes = endTime.getMinutes().toString().padStart(2, '0');
                
                document.getElementById('end_time').value = `${endHours}:${endMinutes}`;
            }
        });
    </script>
</body>
</html>