<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "config/database.php";
<<<<<<< HEAD

// Total Patients
$patients = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM patients"))['total'];

// Total Doctors
$doctors = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM doctors"))['total'];

// Today's Appointments
$appointments = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM appointments"))['total'];

// Total Revenue
$revenue = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(amount) AS total FROM billing"))['total'];

if (!$revenue) {
    $revenue = 0;
}
?>

=======
?>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
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

<<<<<<< HEAD
 <li>
    <a href="modules/doctors/add_doctors.php">
        <i class="fa-solid fa-user-doctor"></i>
        Doctors
    </a>
</li>
                
        
            

           <li>
    <a href="modules/appointments/add_appointment.php">
        <i class="fa-solid fa-calendar-check"></i>
        Appointments
    </a>
</li>

<li>
    <a href="modules/pharmacy/view_medicines.php">
        <i class="fa-solid fa-capsules"></i>
        Pharmacy
    </a>
</li>

<li>
    <a href="modules/laboratory/add_test.php">
        <i class="fa-solid fa-flask-vial"></i>
        Laboratory
    </a>
</li>

<li>
    <a href="modules/wards/add_ward.php">
        <i class="fa-solid fa-bed"></i>
        Ward
    </a>
</li>

            <li>
    <a href="modules/billing/add_bill.php">
        <i class="fa-solid fa-file-invoice-dollar"></i>
        Billing
    </a>
</li>

           <li>
    <a href="modules/reports/report.php">
        <i class="fa-solid fa-chart-line"></i>
        Reports
    </a>
</li>

           <li>
    <a href="modules/settings/settings.php">
        <i class="fa-solid fa-gear"></i>
        Settings
    </a>
</li>
=======
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
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106

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

<<<<<<< HEAD
       <div class="topbar" style="display:flex;justify-content:space-between;align-items:center;">

    <h2>
   Welcome,
<?php
 echo $_SESSION['admin_name'];
  ?>    
    </h2>

   

</div>
=======
        <div class="topbar">

            <h2>

                Welcome,
                <?php echo $_SESSION['admin_name']; ?>

            </h2>

        </div>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
        <div class="card-grid">

    <div class="dashboard-card">
        <i class="fa-solid fa-user-injured"></i>
        <h5>Total Patients</h5>
<<<<<<< HEAD
        <h2><?php echo $patients; ?></h2>
=======
        <h2>125</h2>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-user-doctor"></i>
        <h5>Total Doctors</h5>
<<<<<<< HEAD
        <h2><?php echo $doctors; ?></h2>
=======
        <h2>18</h2>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-calendar-check"></i>
        <h5>Today's Appointments</h5>
<<<<<<< HEAD
        <h2><?php echo $appointments; ?></h2>
=======
        <h2>32</h2>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
    </div>

    <div class="dashboard-card">
        <i class="fa-solid fa-indian-rupee-sign"></i>
        <h5>Total Revenue</h5>
<<<<<<< HEAD
        <h2>₹<?php echo number_format($revenue); ?></h2>
=======
        <h2>₹85,000</h2>
>>>>>>> d8703f907a74b15f87f9e3b0f402de030a535106
    </div>

</div>

    </main>

</div>

</body>
</html>