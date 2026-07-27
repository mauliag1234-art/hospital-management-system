<?php
include("../../config/database.php");

if (isset($_POST['patient_name'])) {

    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $treatment = $_POST['treatment'];
    $bill_date = $_POST['bill_date'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];

    $sql = "INSERT INTO billing
    (patient_name, doctor_name, treatment, bill_date, amount, payment_method, status)
    VALUES
    ('$patient_name','$doctor_name','$treatment','$bill_date','$amount','$payment_method','$status')";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Bill Added Successfully');
                window.location='view_billing.php';
              </script>";
    }else{
        echo "Error : " . mysqli_error($conn);
    }

}
?>