<?php

require 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];  // Get the user_id from session

// Query to fetch the std_id from Students table using user_id
$sql = "SELECT student_id FROM students WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  // Bind the user_id to the query

// Execute the query
$stmt->execute();

// Bind the result to a variable
$stmt->bind_result($std_id);

// Fetch the result
if ($stmt->fetch()) {
    // Successfully fetched the std_id
    $stdID =  $std_id;
} else {
    // If no matching record is found
    echo "No student found with the provided user ID.";
}

// Close the prepared statement and connection
$stmt->close();

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <!-- Metadata, CSS, and general head content -->
    <?php include 'includes/header.php'; ?>
</head>
<body>

    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div id="wrapper" class="wrapper bg-ash">
        
        <!-- Header / Topbar Start -->
        <?php include 'includes/topbar.php'; ?>
        <!-- Header / Topbar End -->
        
        <!-- Page Content Start -->
        <div class="dashboard-page-one">
            
            <!-- Sidebar Start -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- Sidebar End -->
            
            <!-- Main Content Area Start -->
            <div class="dashboard-content-one">
                
                <!-- Breadcrumbs / Page Title Start -->
                <?php include 'includes/breadcubs.php'; ?>
                <!-- Breadcrumbs / Page Title End -->
                
                <!-- Dashboard Top Cards Start -->
                
                <!-- Dashboard Top Cards End -->
                <?php include 'includes/student-topcard.php'; ?>
                <!-- Dashboard Main Content Start -->
                <?php include 'includes/student-maincard.php'; ?>
                <!-- Dashboard Main Content End -->
            
                <!-- Footer Start -->
                <?php include 'includes/footer.php'; ?>
                <!-- Footer End -->
            </div>
            <!-- Main Content Area End -->
        </div>
        <!-- Page Content End -->
    </div>
    <!-- Wrapper End -->

    <!-- Scripts (JS files) -->
    <?php include 'includes/scripts.php'; ?>
</body>
</html>
