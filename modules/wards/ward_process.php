<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (isset($_POST['add_ward'])) {

    $ward_name = mysqli_real_escape_string($conn, $_POST['ward_name']);
    $ward_type = mysqli_real_escape_string($conn, $_POST['ward_type']);
    $total_beds = mysqli_real_escape_string($conn, $_POST['total_beds']);
    $available_beds = mysqli_real_escape_string($conn, $_POST['available_beds']);
    $floor_no = mysqli_real_escape_string($conn, $_POST['floor_no']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "INSERT INTO wards
    (ward_name, ward_type, total_beds, available_beds, floor_no, status)
    VALUES
    ('$ward_name', '$ward_type', '$total_beds', '$available_beds', '$floor_no', '$status')";
        if (mysqli_query($conn, $query)) {

        echo "<script>
                alert('Ward Added Successfully');
                window.location='view_wards.php';
              </script>";

    } else {

        echo "<script>
                alert('Failed to Add Ward');
                window.location='add_ward.php';
              </script>";

    }

} else {

    header("Location: add_ward.php");
    exit();

}

mysqli_close($conn);
?>