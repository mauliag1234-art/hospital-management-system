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
    <title>Add Patient | MediCore HMS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Patient CSS -->
    <link rel="stylesheet" href="../../assets/css/patient.css">
</head>

<body>

<div class="container mt-5">

    <div class="patient-card">

        <h2>
            <i class="fa-solid fa-user-plus"></i>
            Add New Patient
        </h2>

        <hr>

        <form action="patient_process.php" method="POST" enctype="multipart/form-data">

          <div class="row">

          <div class="col-md-3 mb-4">

    <div class="photo-box">

       <img id="preview"
     src="../../assets/images/default-patient.png"
     alt="Patient Photo">
    </div>

    <br>

    <input
        type="file"
        class="form-control"
        id="photo"
        name="photo"
        accept="image/*">

    <div class="upload-text mt-2">

        Upload Patient Photo

    </div>

</div>

<div class="col-md-9"></div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Patient Photo</label>
        <input type="file" class="form-control" name="photo">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Patient ID</label>
        <input type="text" class="form-control" value="Auto Generated" readonly>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Admission Date</label>
        <input type="date" class="form-control" name="admission_date">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="full_name" required>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Blood Group</label>
        <select class="form-select" name="blood_group">
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>AB+</option>
            <option>AB-</option>
            <option>O+</option>
            <option>O-</option>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date"
       class="form-control"
       id="dob"
       name="dob"
       required>
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label">Age</label>
        <input type="number"
       class="form-control"
       id="age"
       name="age"
       readonly>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Assigned Doctor</label>
        <input type="text" class="form-control" name="doctor">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Disease</label>
        <input type="text" class="form-control" name="disease">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select class="form-select" name="status">
            <option>Admitted</option>
            <option>Discharged</option>
        </select>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" rows="3" name="address"></textarea>
    </div>

</div>

<div class="text-end mt-3">
    <button type="reset" class="btn btn-secondary">
        Reset
    </button>

    <button type="submit" class="btn btn-primary">
        Save Patient
    </button>
</div>

        </form>

    </div>

</div>

<script src="../../assets/js/patient.js"></script>

</body>
</html>