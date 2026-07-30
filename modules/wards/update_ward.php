<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (isset($_POST['update'])) {

    $ward_id = mysqli_real_escape_string($conn, $_POST['ward_id']);
    $ward_name = mysqli_real_escape_string($conn, $_POST['ward_name']);
    $ward_type = mysqli_real_escape_string($conn, $_POST['ward_type']);
    $total_beds = mysqli_real_escape_string($conn, $_POST['total_beds']);
    $available_beds = mysqli_real_escape_string($conn, $_POST['available_beds']);
    $floor_no = mysqli_real_escape_string($conn, $_POST['floor_no']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE wards SET
                ward_name='$ward_name',
                ward_type='$ward_type',
                total_beds='$total_beds',
                available_beds='$available_beds',
                floor_no='$floor_no',
                status='$status'
              WHERE ward_id='$ward_id'";

    if (mysqli_query($conn, $query)) {

        echo "<script>
                alert('Ward Updated Successfully');
                window.location='view_wards.php';
              </script>";

    } else {

        echo "<script>
                alert('Update Failed');
                window.location='edit_ward.php?id=$ward_id';
              </script>";

    }

} else {

    header("Location:view_wards.php");
    exit();

}

mysqli_close($conn);
?>