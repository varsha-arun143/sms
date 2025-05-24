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
$slotId = $_GET['id'] ?? 0;

// Check if slot belongs to user
$stmt = $conn->prepare("SELECT id FROM time_slots WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $slotId, $userId);
$stmt->execute();

if ($stmt->get_result()->num_rows === 1) {
    // Delete the slot
    $stmt = $conn->prepare("DELETE FROM time_slots WHERE id = ?");
    $stmt->bind_param("i", $slotId);
    $stmt->execute();
}

header('location: view_slots.php');
?>