<?php
session_start();
include("../../config/database.php");

if (!isset($_GET['id'])) {
    header("Location: view_medicines.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM medicines WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    $_SESSION['success'] = "Medicine Deleted Successfully";

    header("Location: view_medicines.php");
    exit();

} else {

    echo "Delete Failed : " . mysqli_error($conn);

}
?>