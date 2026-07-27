<?php
// ======================================
// Database Configuration (Localhost)
// ======================================

$host = "localhost";
$username = "root";
$password = "";
$database = "hospital_dashboard";

// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Set UTF-8 Encoding
mysqli_set_charset($conn, "utf8");
?>