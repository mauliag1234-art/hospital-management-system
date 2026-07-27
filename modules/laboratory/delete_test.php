<?php
session_start();
include("../../config/database.php");

if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM laboratory WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        $_SESSION['success'] = "Laboratory Test Deleted Successfully.";
    }
    else
    {
        $_SESSION['error'] = "Failed to Delete Laboratory Test.";
    }
}
else
{
    $_SESSION['error'] = "Invalid Request.";
}

header("Location: view_tests.php");
exit();
?>