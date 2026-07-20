<?php
session_start();

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

}
?>