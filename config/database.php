<?php
<<<<<<< HEAD
// ======================================
// Database Configuration (Localhost)
// ======================================
=======
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106

$host = "localhost";
$username = "root";
$password = "";
$database = "hospital_dashboard";

<<<<<<< HEAD
// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check Connection
=======
$conn = mysqli_connect($host, $username, $password, $database);

>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

<<<<<<< HEAD
// Set UTF-8 Encoding
mysqli_set_charset($conn, "utf8");
=======
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
?>