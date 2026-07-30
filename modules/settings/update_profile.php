<?php
session_start();
include "../../config/database.php";

if(isset($_POST['username'])){

    $role = $_POST['role'];
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    switch($role){

        case "admin":
            $table="admin";
            $id=$_SESSION['admin_id'];

            $sql="UPDATE admin SET
            fullname='$fullname',
            username='$username'";

            if(!empty($password)){
                $sql.=", password='$password'";
            }

            $sql.=" WHERE id='$id'";
            break;

        case "doctors":
            $table="doctors";

            $sql="UPDATE doctors SET
            username='$username'";

            if(!empty($password)){
                $sql.=", password='$password'";
            }

            $sql.=" LIMIT 1";
            break;

        case "laboratory":

            $sql="UPDATE laboratory SET
            username='$username'";

            if(!empty($password)){
                $sql.=", password='$password'";
            }

            $sql.=" LIMIT 1";
            break;

        case "medicines":

            $sql="UPDATE medicines SET
            username='$username'";

            if(!empty($password)){
                $sql.=", password='$password'";
            }

            $sql.=" LIMIT 1";
            break;
    }

    if(mysqli_query($conn,$sql)){
        echo "<script>
        alert('Updated Successfully');
        window.location='settings.php';
        </script>";
    }else{
        echo mysqli_error($conn);
    }

}
?>