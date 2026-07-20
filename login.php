<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>MediCore HMS | Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/login.css">

</head>

<body>

<div class="login-wrapper">

<div class="login-left">

<div class="brand">

<div class="logo">
<i class="fa-solid fa-hospital"></i>
</div>

<h1>MediCore HMS</h1>

<p>Smart Hospital Management System</p>

</div>

<div class="feature-list">

<div class="feature">
<i class="fa-solid fa-user-injured"></i>
<span>Patient Management</span>
</div>

<div class="feature">
<i class="fa-solid fa-user-doctor"></i>
<span>Doctor Management</span>
</div>

<div class="feature">
<i class="fa-solid fa-calendar-check"></i>
<span>Appointment Scheduling</span>
</div>

<div class="feature">
<i class="fa-solid fa-file-invoice-dollar"></i>
<span>Billing & Reports</span>
</div>

</div>

</div>

<div class="login-right">

<div class="login-card">

<h2>Welcome Back</h2>

<p>Login to continue</p>

<form action="login_process.php" method="POST">

<div class="input-box">

<label>Username</label>

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-user"></i>

</span>

<input
type="text"
name="username"
class="form-control"
placeholder="Enter Username"
required>

</div>

</div>

<div class="input-box">

<label>Password</label>

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-lock"></i>

</span>

<input
type="password"
id="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

<span class="input-group-text toggle-password">

<i class="fa-solid fa-eye"></i>

</span>

</div>

</div>

<div class="d-flex justify-content-between align-items-center mb-4">

<div class="form-check">

<input
class="form-check-input"
type="checkbox"
id="remember">

<label class="form-check-label" for="remember">

Remember Me

</label>

</div>

<a href="#" class="forgot-link">

Forgot Password?

</a>

</div>

<button type="submit" class="login-btn">

<i class="fa-solid fa-right-to-bracket"></i>

Sign In

</button>

</form>

</div>

</div>

</div>

<script src="assets/js/login.js"></script>

</body>
</html>