<?php
session_start();
include("../../config/database.php");

if (isset($_POST['save'])) {

    $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $batch_no = mysqli_real_escape_string($conn, $_POST['batch_no']);
    $manufacture_date = mysqli_real_escape_string($conn, $_POST['manufacture_date']);
    $expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "INSERT INTO medicines
    (
        medicine_name,
        category,
        company,
        batch_no,
        manufacture_date,
        expiry_date,
        quantity,
        price
    )
    VALUES
    (
        '$medicine_name',
        '$category',
        '$company',
        '$batch_no',
        '$manufacture_date',
        '$expiry_date',
        '$quantity',
        '$price'
    )";

    $result = mysqli_query($conn, $query);

    if ($result) {

        $_SESSION['success'] = "Medicine Added Successfully.";

        header("Location: view_medicines.php");
        exit();

    } else {

        $_SESSION['error'] = "Failed to Add Medicine.";

        echo mysqli_error($conn);
    }

} else {

    header("Location: add_medicine.php");
    exit();

}
?>