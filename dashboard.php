<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediCore HMS | Dashboard</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->

    <aside class="sidebar">

        <div class="logo">

            <i class="fa-solid fa-hospital"></i>

            <h2>MediCore HMS</h2>

        </div>

        <ul>

            <li class="active">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </li>

           <li>
    <a href="modules/patients/add_patient.php">
        <i class="fa-solid fa-user-injured"></i>
        Patients
    </a>
</li>

            <li>
                <i class="fa-solid fa-user-doctor"></i>
                Doctors
            </li>

            <li>
                <i class="fa-solid fa-calendar-check"></i>
                Appointments
            </li>

            <li>
                <i class="fa-solid fa-file-invoice-dollar"></i>
                Billing
            </li>

            <li>
                <i class="fa-solid fa-chart-line"></i>
                Reports
            </li>

            <li>
                <i class="fa-solid fa-gear"></i>
                Settings
            </li>

            <li>

                <a href="logout.php">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Logout

                </a>

            </li>

        </ul>

    </aside>

    <!-- Main -->

    <main class="main-content">

        <div class="topbar">

            <h2>

                Welcome,
                <?php echo $_SESSION['admin_name']; ?>

            </h2>

        </div>
        <div class="card-grid">

    <div class="dashboard-card">
        <i class="fa-solid fa-user-injured"></i>
        <h5>Total Patients</h5>
        <h2>125</h2>
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-user-doctor"></i>
        <h5>Total Doctors</h5>
        <h2>18</h2>
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-calendar-check"></i>
        <h5>Today's Appointments</h5>
        <h2>32</h2>
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-indian-rupee-sign"></i>
        <h5>Total Revenue</h5>
        <h2>₹85,000</h2>
    </div>

</div>

    </main>

</div>

</body>
</html>