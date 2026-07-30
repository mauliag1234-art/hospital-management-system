<?php
session_start();
include "config/database.php";

if (!isset($_SESSION['reset_email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {

    $email = $_SESSION['reset_email'];

    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($new_password != $confirm_password) {

        echo "<script>
        alert('Passwords do not match!');
        window.location='reset_password.php';
        </script>";
        exit();
    }

    $update = mysqli_query($conn,
        "UPDATE admin SET password='$new_password' WHERE email='$email'");

    if ($update) {

        unset($_SESSION['reset_email']);

        echo "<script>
        alert('Password Updated Successfully');
        window.location='login.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed to Update Password');
        window.location='reset_password.php';
        </script>";

    }

} else {

    header("Location: login.php");

}
?>