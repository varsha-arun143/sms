<?php
// update_staff_status.php
require_once 'db_connection.php'; // Your database connection file

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffId = $_POST['staff_id'] ?? null;
    $field = $_POST['field'] ?? null;
    $value = $_POST['value'] ?? null;
    
    if ($staffId && $field && in_array($field, ['is_emergency_staff', 'emergency_availability'])) {
        try {
            $stmt = $pdo->prepare("UPDATE staff SET $field = :value WHERE id = :id");
            $stmt->execute([':value' => $value, ':id' => $staffId]);
            
            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid parameters']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>