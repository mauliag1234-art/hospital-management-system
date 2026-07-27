<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
    $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    $query = "UPDATE appointments SET
                patient_id='$patient_id',
                doctor_id='$doctor_id',
                appointment_date='$appointment_date',
                appointment_time='$appointment_time',
                status='$status',
                remarks='$remarks'
              WHERE appointment_id='$appointment_id'";

    if (mysqli_query($conn, $query)) {

        $_SESSION['success'] = "Appointment Updated Successfully!";
        header("Location: view_appointment.php");
        exit();

    } else {

        $_SESSION['error'] = "Failed to Update Appointment!";
        header("Location: edit_appointment.php?id=".$appointment_id);
        exit();

    }

} else {

    header("Location: view_appointment.php");
    exit();

}
?>