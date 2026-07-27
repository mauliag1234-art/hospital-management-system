<?php
session_start();
include("../../config/database.php");

if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD'] == "POST")
{
    $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
    $doctor_name  = mysqli_real_escape_string($conn, $_POST['doctor_name']);
    $test_name    = mysqli_real_escape_string($conn, $_POST['test_name']);
    $test_date    = mysqli_real_escape_string($conn, $_POST['test_date']);
    $result       = mysqli_real_escape_string($conn, $_POST['result']);
    $status       = mysqli_real_escape_string($conn, $_POST['status']);
    $remarks      = mysqli_real_escape_string($conn, $_POST['remarks']);

    $sql = "INSERT INTO laboratory
    (patient_name, doctor_name, test_name, test_date, result, status, remarks)
    VALUES
    ('$patient_name','$doctor_name','$test_name','$test_date','$result','$status','$remarks')";

    if(mysqli_query($conn,$sql))
    {
                $_SESSION['success'] = "Laboratory Test Added Successfully.";

        header("Location: view_tests.php");
        exit();

    }
    else
    {
        $_SESSION['error'] = "Failed to Add Laboratory Test.";

        header("Location: add_test.php");
        exit();
    }

}
else
{
    header("Location: add_test.php");
    exit();
}
?>