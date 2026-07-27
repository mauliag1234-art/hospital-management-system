<?php
session_start();
include("../../config/database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
    $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
    $test_name = mysqli_real_escape_string($conn, $_POST['test_name']);
    $test_date = mysqli_real_escape_string($conn, $_POST['test_date']);
    $result = mysqli_real_escape_string($conn, $_POST['result']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    $sql = "UPDATE laboratory SET
            patient_name='$patient_name',
            doctor_name='$doctor_name',
            test_name='$test_name',
            test_date='$test_date',
            result='$result',
            status='$status',
            remarks='$remarks'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        $_SESSION['success'] = "Laboratory Test Updated Successfully.";
    }
    else
    {
        $_SESSION['error'] = "Failed to Update Laboratory Test.";
    }

    header("Location: view_tests.php");
    exit();
}
else
{
    header("Location: view_tests.php");
    exit();
}
?>