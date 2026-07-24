<?php
session_start();
include("../../config/database.php");

if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $batch_no = mysqli_real_escape_string($conn, $_POST['batch_no']);
    $manufacture_date = mysqli_real_escape_string($conn, $_POST['manufacture_date']);
    $expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql = "UPDATE medicines SET
            medicine_name='$medicine_name',
            category='$category',
            company='$company',
            batch_no='$batch_no',
            manufacture_date='$manufacture_date',
            expiry_date='$expiry_date',
            quantity='$quantity',
            price='$price'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['success'] = "Medicine Updated Successfully";

        header("Location: view_medicines.php");
        exit();

    } else {

        echo "Update Failed : " . mysqli_error($conn);

    }

} else {

    header("Location: view_medicines.php");
    exit();

}
?>