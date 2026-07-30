<?php
session_start();
include "config/database.php";

if(isset($_POST['email'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check = mysqli_query($conn,
        "SELECT * FROM admin WHERE email='$email'");

    if(mysqli_num_rows($check)==1){

        $_SESSION['reset_email'] = $email;

        header("Location: reset_password.php");
        exit();

    }else{

        echo "<script>
        alert('Email Not Found!');
        window.location='forget_password.php';
        </script>";

    }

}else{

    header("Location: login.php");

}
?>