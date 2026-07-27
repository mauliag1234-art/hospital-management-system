<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
    $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    $query = "INSERT INTO appointments
    (patient_id, doctor_id, appointment_date, appointment_time, status, remarks)
    VALUES
    ('$patient_id', '$doctor_id', '$appointment_date', '$appointment_time', '$status', '$remarks')";

    if (mysqli_query($conn, $query)) {

        $_SESSION['success'] = "Appointment Added Successfully!";
        header("Location: view_appointments.php");
        exit();

    } else {

        $_SESSION['error'] = "Failed to Add Appointment!";
        header("Location: add_appointment.php");
        exit();

    }
}
?>