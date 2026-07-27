<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Check ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = "Invalid Appointment ID!";
    header("Location: view_appointment.php");
    exit();
}

$appointment_id = mysqli_real_escape_string($conn, $_GET['id']);

// Check Appointment Exists
$check = mysqli_query($conn, "SELECT * FROM appointments WHERE appointment_id='$appointment_id'");

if (mysqli_num_rows($check) == 0) {
    $_SESSION['error'] = "Appointment Not Found!";
    header("Location: view_appointment.php");
    exit();
}

// Delete Appointment
$query = "DELETE FROM appointments WHERE appointment_id='$appointment_id'";

if (mysqli_query($conn, $query)) {

    $_SESSION['success'] = "Appointment Deleted Successfully!";

} else {

    $_SESSION['error'] = "Failed to Delete Appointment!";

}

header("Location: view_appointment.php");
exit();
?>