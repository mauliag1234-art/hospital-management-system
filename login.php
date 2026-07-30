<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediCore HMS | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>

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
value="<?php echo isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : ''; ?>"
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
    id="remember"
    name="remember"
    value="1">

                    <label
                        class="form-check-label"
                        for="remember">

                        Remember Me

                    </label>

                </div>

                <a href="forget_password.php" class="forgot-link">
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

</div>

<script src="assets/js/login.js"></script>

</body>

</html>