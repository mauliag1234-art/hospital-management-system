<?php
session_start();
<<<<<<< HEAD
include "config/database.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.php");
    exit();
}

$role = trim($_POST['role']);
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim($_POST['password']));

switch ($role) {

    case "Administrator":
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        break;

    case "Doctor":
        $sql = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
        break;

    case "Laboratory":
        $sql = "SELECT * FROM laboratory WHERE username='$username' AND password='$password'";
        break;

    case "Pharmacy":
        $sql = "SELECT * FROM medicines WHERE username='$username' AND password='$password'";
        break;

    default:
        die("Invalid Role");
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL Error : " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    // Session ID
    if ($role == "Pharmacy") {
        $_SESSION['admin_id'] = $row['medicine_id'];
    } else {
        $_SESSION['admin_id'] = $row['id'];
    }

    $_SESSION['admin_name'] = $row['username'];
    $_SESSION['role'] = $role;

    header("Location: dashboard.php");
    exit();

} else {

    echo "<script>
    alert('Invalid Username or Password');
    window.location='login.php';
    </script>";
    exit();
=======

include "config/database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$row=mysqli_fetch_assoc($result);

$_SESSION['admin_id']=$row['id'];
$_SESSION['admin_name']=$row['fullname'];

header("Location: dashboard.php");
exit;

}else{

echo "<script>
alert('Invalid Username or Password');
window.location='login.php';
</script>";

>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
}
?>