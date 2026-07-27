<?php
session_start();
include "../../config/database.php";

if(isset($_POST['current_password'])){

    $role = $_POST['role'];

    $current = mysqli_real_escape_string($conn,$_POST['current_password']);
    $new = mysqli_real_escape_string($conn,$_POST['new_password']);
    $confirm = mysqli_real_escape_string($conn,$_POST['confirm_password']);

    if($new != $confirm){
        echo "<script>
        alert('Passwords do not match');
        window.location='settings.php';
        </script>";
        exit();
    }

    switch($role){

        case "admin":
            $id=$_SESSION['admin_id'];

            $check=mysqli_query($conn,"SELECT * FROM admin WHERE id='$id' AND password='$current'");

            if(mysqli_num_rows($check)==1){

                mysqli_query($conn,"UPDATE admin SET password='$new' WHERE id='$id'");

                echo "<script>
                alert('Password Updated');
                window.location='settings.php';
                </script>";

            }else{

                echo "<script>
                alert('Current Password Wrong');
                window.location='settings.php';
                </script>";

            }
        break;

        case "doctors":
            mysqli_query($conn,"UPDATE doctors SET password='$new' WHERE password='$current' LIMIT 1");
        break;

        case "laboratory":
            mysqli_query($conn,"UPDATE laboratory SET password='$new' WHERE password='$current' LIMIT 1");
        break;

        case "medicines":
            mysqli_query($conn,"UPDATE medicines SET password='$new' WHERE password='$current' LIMIT 1");
        break;
    }

    if($role!="admin"){
        echo "<script>
        alert('Password Updated');
        window.location='settings.php';
        </script>";
    }
}
?>