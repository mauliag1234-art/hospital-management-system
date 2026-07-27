<?php
include("../../config/database.php");

if(isset($_POST['bill_id'])){

    $bill_id = $_POST['bill_id'];
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $treatment = $_POST['treatment'];
    $bill_date = $_POST['bill_date'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];

    $sql = "UPDATE billing SET

            patient_name='$patient_name',
            doctor_name='$doctor_name',
            treatment='$treatment',
            bill_date='$bill_date',
            amount='$amount',
            payment_method='$payment_method',
            status='$status'

            WHERE bill_id='$bill_id'";

    if(mysqli_query($conn,$sql)){

        echo "<script>
                alert('Bill Updated Successfully');
                window.location='view_billing.php';
              </script>";

    }else{

        echo "Error : ".mysqli_error($conn);

    }

}else{

    echo "Invalid Request";

}
?>