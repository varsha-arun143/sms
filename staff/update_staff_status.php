<?php
include('../db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['field'], $_POST['value'])) {
    session_start();

    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "Unauthorized access!";
        exit();
    }

    $userId = $_SESSION['user_id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Check if the field is valid
    if (!in_array($field, ['is_emergency_staff', 'emergency_availability'])) {
        echo "Invalid field!";
        exit();
    }

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE staff SET $field = ? WHERE user_id = ?");
    $stmt->bind_param("ii", $value, $userId);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile!";
    }
    $stmt->close();
} else {
    echo "Invalid request!";
}
?>
