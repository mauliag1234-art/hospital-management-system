<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Medicine ID Not Found");
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM medicines WHERE medicine_id='$id'";

if (mysqli_query($conn, $query)) {

    echo "<script>
            alert('Medicine Deleted Successfully');
            window.location='view_medicines.php';
          </script>";

} else {

    echo "<script>
            alert('Delete Failed');
            window.location='view_medicines.php';
          </script>";

}
?>