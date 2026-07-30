<?php
session_start();

include "../../config/database.php";

if(isset($_POST['addMedicine']))
{

    $medicine_name = mysqli_real_escape_string($conn, $_POST['medicine_name']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $query = "INSERT INTO medicines
    (medicine_name, company, quantity, price, expiry_date, status)
    VALUES
    ('$medicine_name', '$company', '$quantity', '$price', '$expiry_date', '$status')";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo "<script>
        alert('Medicine Added Successfully!');
        window.location='view_medicines.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Failed to Add Medicine!');
        window.history.back();
        </script>";
    }

}

?>