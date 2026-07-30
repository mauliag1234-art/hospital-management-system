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

<title>Add Medicine | MediCore HMS</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<!-- Dashboard CSS -->

<link rel="stylesheet" href="../../assets/css/dashboard.css">

<style>

.form-card{

background:#fff;

padding:30px;

border-radius:15px;

box-shadow:0 10px 25px rgba(0,0,0,.08);

margin-top:25px;

}

.form-title{

font-size:28px;

font-weight:600;

margin-bottom:25px;

color:#0d6efd;

}

</style>

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

<li>

<a href="../../dashboard.php">

<i class="fa-solid fa-house"></i>

Dashboard

</a>

</li>

<li>

<a href="../patients/add_patient.php">

<i class="fa-solid fa-user-injured"></i>

Patients

</a>

</li>

<li>

<a href="../doctors/add_doctors.php">

<i class="fa-solid fa-user-doctor"></i>

Doctors

</a>

</li>

<li>

<a href="../appointments/add_appointment.php">

<i class="fa-solid fa-calendar-check"></i>

Appointments

</a>

</li>

<li class="active">

<i class="fa-solid fa-capsules"></i>

Pharmacy

</li>

<li>

<a href="../billing/add_bill.php">

<i class="fa-solid fa-file-invoice-dollar"></i>

Billing

</a>

</li>

<li>

<a href="../reports/index.php">

<i class="fa-solid fa-chart-line"></i>

Reports

</a>

</li>

<li>

<a href="../settings/index.php">

<i class="fa-solid fa-gear"></i>

Settings

</a>

</li>

<li>

<a href="../../logout.php">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</li>

</ul>

</aside>

<!-- Main Content -->

<main class="main-content">

<div class="topbar">

<h2>

<i class="fa-solid fa-capsules"></i>

Add Medicine

</h2>

</div>

<div class="container-fluid">

<div class="form-card">

<h3 class="form-title">

<i class="fa-solid fa-plus"></i>

Add New Medicine

</h3>
<form action="medicine_process.php" method="POST">

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Medicine Name</label>
        <input type="text"
               name="medicine_name"
               class="form-control"
               placeholder="Enter Medicine Name"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Company Name</label>
        <input type="text"
               name="company"
               class="form-control"
               placeholder="Enter Company Name"
               required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Quantity</label>
        <input type="number"
               name="quantity"
               class="form-control"
               placeholder="Quantity"
               required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Price (₹)</label>
        <input type="number"
               step="0.01"
               name="price"
               class="form-control"
               placeholder="Price"
               required>
    </div>
<div class="col-md-4 mb-3">
    <label class="form-label">Manufacturing Date</label>
    <input type="date"
           name="manufacturing_date"
           class="form-control"
           required>
</div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Expiry Date</label>
        <input type="date"
               name="expiry_date"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">

            <option value="Available">Available</option>

            <option value="Out of Stock">Out of Stock</option>

        </select>

    </div>

</div>

<div class="text-end">

<button type="reset"
class="btn btn-secondary">

<i class="fa-solid fa-rotate-left"></i>

Reset

</button>

<button type="submit"
name="addMedicine"
class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Save Medicine

</button>

</div>

</form>
</div>

</div>

</main>

</div>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>