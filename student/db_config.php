<?php
session_start();
// db_config.php

$servername = "localhost";  // Database server (usually localhost)
$username = "root";         // Database username
$password = "";             // Database password (leave empty for local environment)
$dbname = "u329947844_sms"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
