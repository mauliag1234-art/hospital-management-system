<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Ward | MediCore HMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link rel="stylesheet" href="../../assets/css/dashboard.css">

<style>

.form-card{
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    margin-top:25px;
}

.page-title{
    color:#0d6efd;
    font-size:30px;
    font-weight:600;
    margin-bottom:25px;
}

</style>

</head>

<body>

<div class="wrapper">

<aside class="sidebar">

<div class="logo">
<i class="fa-solid fa-hospital"></i>
<h2>MediCore HMS</h2>
</div>

<ul>

<li><a href="../../dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>

<li><a href="../patients/add_patient.php"><i class="fa-solid fa-user-injured"></i> Patients</a></li>

<li><a href="../doctors/add_doctors.php"><i class="fa-solid fa-user-doctor"></i> Doctors</a></li>

<li><a href="../appointments/add_appointment.php"><i class="fa-solid fa-calendar-check"></i> Appointments</a></li>

<li><a href="../pharmacy/view_medicines.php"><i class="fa-solid fa-capsules"></i> Pharmacy</a></li>

<li><a href="../laboratory/view_tests.php"><i class="fa-solid fa-flask-vial"></i> Laboratory</a></li>

<li class="active">
<i class="fa-solid fa-bed"></i>
Ward
</li>

<li><a href="../billing/add_bill.php"><i class="fa-solid fa-file-invoice-dollar"></i> Billing</a></li>

<li><a href="../reports/index.php"><i class="fa-solid fa-chart-line"></i> Reports</a></li>

<li><a href="../settings/index.php"><i class="fa-solid fa-gear"></i> Settings</a></li>

<li><a href="../../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

</ul>

</aside>

<main class="main-content">

<div class="topbar">

<h2>
<i class="fa-solid fa-bed"></i>
Add Ward
</h2>

</div>

<div class="container-fluid">

<div class="form-card">

<h3 class="page-title">
<i class="fa-solid fa-bed"></i>
Add New Ward
</h3>

<form action="ward_process.php" method="POST">

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Ward Name</label>
        <input type="text" name="ward_name" class="form-control" placeholder="Enter Ward Name" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Ward Type</label>
        <select name="ward_type" class="form-select" required>
            <option value="">Select Ward Type</option>
            <option value="General">General</option>
            <option value="Private">Private</option>
            <option value="ICU">ICU</option>
            <option value="Emergency">Emergency</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Total Beds</label>
        <input type="number" name="total_beds" class="form-control" placeholder="Enter Total Beds" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Available Beds</label>
        <input type="number" name="available_beds" class="form-control" placeholder="Enter Available Beds" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Floor Number</label>
        <input type="text" name="floor_no" class="form-control" placeholder="Enter Floor Number" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="Available">Available</option>
            <option value="Full">Full</option>
            <option value="Maintenance">Maintenance</option>
        </select>
    </div>

</div>

<div class="mt-3">

    <button type="submit" class="btn btn-primary" name="add_ward">
        <i class="fa-solid fa-floppy-disk"></i>
        Save Ward
    </button>

    <a href="view_wards.php" class="btn btn-success">
        <i class="fa-solid fa-eye"></i>
        View Wards
    </a>

    <button type="reset" class="btn btn-secondary">
        <i class="fa-solid fa-rotate-right"></i>
        Reset
    </button>

</div>
</form>

</div>

</div>

</main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>