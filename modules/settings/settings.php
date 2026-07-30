<?php
session_start();
include "../../config/database.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

$id = $_SESSION['admin_id'];

$result = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id' LIMIT 1");

if (!$result) {
    die(mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    $result = mysqli_query($conn, "SELECT * FROM admin LIMIT 1");
}

$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}
body{
    background:#f4f7fc;
}
.container{
    width:90%;
    max-width:900px;
    margin:40px auto;
}
.card{
    background:#fff;
    border-radius:12px;
    padding:25px;
    margin-bottom:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}
.card h2{
    color:#0d6efd;
    margin-bottom:20px;
}
label{
    font-weight:bold;
    display:block;
    margin-top:15px;
}
input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:8px;
}
button{
    margin-top:20px;
    background:#0d6efd;
    color:#fff;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    cursor:pointer;
}
button:hover{
    background:#084298;
}
.back{
    text-decoration:none;
    color:white;
    background:#198754;
    padding:10px 18px;
    border-radius:8px;
    display:inline-block;
    margin-bottom:20px;
}
.about{
    line-height:30px;
}
</style>

</head>
<body>

<div class="container">

<a href="../../dashboard.php" class="back">
<i class="fa fa-arrow-left"></i> Back to Dashboard
</a>

<div class="card">
<h2><i class="fa-solid fa-user"></i> Admin Profile</h2>

<form action="update_profile.php" method="POST">
    <label>User Type</label>
<select name="role" id="role" required>
    <option value="admin">Administrator</option>
    <option value="doctors">Doctor</option>
    <option value="laboratory">Laboratory</option>
    <option value="medicines">Pharmacy</option>
</select>

<label>Full Name</label>
<input type="text" name="fullname"
value="<?php echo htmlspecialchars($admin['fullname']); ?>" required>

<label>Username</label>
<input type="text" name="username"
value="<?php echo htmlspecialchars($admin['username']); ?>" required>

<label>Password</label>
<input type="password" name="password" placeholder="Enter New Password">

<button type="submit">
<i class="fa-solid fa-floppy-disk"></i>
Save Profile
</button>

</form>

</div>

<div class="card">

<h2><i class="fa-solid fa-lock"></i> Change Password</h2>

<form action="change_password.php" method="POST">
    <label>User Type</label>
    <select name="role" id="role" required>
        <option value="admin">Administrator</option>
        <option value="doctors">Doctor</option>
        <option value="laboratory">Laboratory</option>
        <option value="medicines">Pharmacy</option>
    </select>

    <label>Current Password</label>
    <input type="password" name="current_password" required>

<label>New Password</label>
<input type="password" name="new_password" required>

<label>Confirm Password</label>
<input type="password" name="confirm_password" required>

<button type="submit">
<i class="fa-solid fa-key"></i>
Change Password
</button>

</form>

<div class="card about">

    <h2><i class="fas fa-hospital"></i> About MediCore HMS</h2>

    <p><strong>System :</strong> MediCore Hospital Management System</p>
    <p><strong>Version :</strong> 1.0</p>
    <p><strong>Developed By :</strong> Team Mauli</p>
    <p><strong>Technology :</strong> PHP, MySQL, HTML, CSS, JavaScript</p>
    <p><strong>Database :</strong> MySQL</p>
    <p><strong>Purpose :</strong> Manage Patients, Doctors, Appointments, Billing, Pharmacy, Laboratory, Ward and Reports.</p>

</div>

</div>
<footer style="text-align:center;padding:20px;color:#666;font-size:14px;">
    © 2026 MediCore Hospital Management System | Developed by Team Mauli
</footer>
</body>
</html>