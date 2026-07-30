<?php
session_start();

if(!isset($_SESSION['reset_email'])){
    header("Location: forget_password.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Reset Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fc;
}

.card{
    max-width:430px;
    margin:80px auto;
    border:none;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.card-header{
    background:#0d6efd;
    color:#fff;
    text-align:center;
    font-size:22px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<div class="card-header">
Reset Password
</div>

<div class="card-body">

<form action="reset_password_process.php" method="POST">

<label>New Password</label>

<input
type="password"
name="new_password"
class="form-control"
required>

<br>

<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
class="form-control"
required>

<br>

<button class="btn btn-primary w-100">

Update Password

</button>

</form>

</div>

</div>

</body>

</html>