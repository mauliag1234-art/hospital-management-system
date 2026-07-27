<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediCore HMS | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="assets/css/login.css">
=======
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>MediCore HMS | Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/login.css">
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106

</head>

<body>

<<<<<<< HEAD
<div class="main-container">

    <!-- Background Image -->

    <img src="assets/images/hospital.jpg" class="bg-image">

    <div class="bg-overlay"></div>

    <!-- Login Card -->

    <div class="login-card">

        <div class="logo-box">

            <img src="assets/images/logo.png" class="logo">

            <h2>MediCore HMS</h2>

            <p>Hospital Management System</p>

        </div>

        <h3>Welcome Back!</h3>

        <span class="sub-title">

            Login to continue

        </span>

        <form action="login_process.php" method="POST">

            <!-- Role -->

            <div class="mb-3">

                <label class="form-label">

                    Login As

                </label>

                <select class="form-select" name="role">

                    <option>Administrator</option>

                    <option>Doctor</option>

                    <option>Laboratory</option>

                    <option>Pharmacy</option>

                </select>

            </div>

            <!-- Username -->

            <div class="mb-3">

                <label class="form-label">

                    Username

                </label>

                <div class="input-group">

                    <span class="input-group-text">

                        <i class="fa fa-user"></i>

                    </span>

                    <input
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Enter Username"
                        required>

                </div>

            </div>

            <!-- Password -->

            <div class="mb-3">

                <label class="form-label">

                    Password

                </label>

                <div class="input-group">

                    <span class="input-group-text">

                        <i class="fa fa-lock"></i>

                    </span>

                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="Enter Password"
                        required>

                    <button
                        class="input-group-text"
                        type="button"
                        id="togglePassword">

                        <i class="fa fa-eye"></i>

                    </button>

                </div>

            </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="remember">

                    <label
                        class="form-check-label"
                        for="remember">

                        Remember Me

                    </label>

                </div>

                <a href="#" class="forgot-link">

                    Forgot Password?

                </a>

            </div>

            <button
                type="submit"
                class="btn login-btn">

                <i class="fa-solid fa-right-to-bracket"></i>

                Sign In

            </button>

        </form>

        <div class="login-footer">

            Secure Login • MediCore HMS © 2026

        </div>

    </div>

    <!-- ==========================
         RIGHT CONTENT
    =========================== -->

    <div class="hero-section">

        <div class="hero-content">

            <h1>

                Advanced Care.

            </h1>

            <h1>

                Better Outcomes.

            </h1>

            <p>

                Delivering world-class healthcare with innovation,
                compassion and modern medical technology.

            </p>

            <div class="feature-list">

                <div class="feature-item">

                    <i class="fa-solid fa-user-doctor"></i>

                    <span>120+ Specialist Doctors</span>

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-bed"></i>

                    <span>250+ Smart Hospital Beds</span>

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-heart-pulse"></i>

                    <span>24×7 Emergency Services</span>

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-microscope"></i>

                    <span>Advanced Diagnostic Laboratory</span>

                </div>

            </div>

            <div class="bottom-glass">

                <div>

                    <h3>50K+</h3>

                    <span>Patients Treated</span>

                </div>

                <div>

                    <h3>99%</h3>

                    <span>Patient Satisfaction</span>

                </div>

                <div>

                    <h3>24×7</h3>

                    <span>Medical Support</span>

                </div>

            </div>

        </div>

    </div>
=======
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
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106

</div>

<script src="assets/js/login.js"></script>

</body>
<<<<<<< HEAD

=======
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
</html>