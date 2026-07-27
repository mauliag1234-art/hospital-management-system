<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Ward ID Not Found");
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM wards WHERE ward_id='$id'";

if (mysqli_query($conn, $query)) {

    echo "<script>
            alert('Ward Deleted Successfully');
            window.location='view_wards.php';
          </script>";

} else {

    echo "<script>
            alert('Failed to Delete Ward');
            window.location='view_wards.php';
          </script>";

}

mysqli_close($conn);
?>