<?php
session_start();
include("../../config/database.php");

// Fetch Patients
$patients = mysqli_query($conn, "SELECT id, patient_name FROM patients ORDER BY patient_name ASC");

// Fetch Doctors
$doctors = mysqli_query($conn, "SELECT id, doctor_name FROM doctors ORDER BY doctor_name ASC");

// Fetch Laboratory Tests
$tests = mysqli_query($conn, "SELECT id, test_name FROM laboratory ORDER BY test_name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Laboratory Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="laboratory.css">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">
    <h3 class="mb-0">Assign Laboratory Test</h3>
</div>

<div class="card-body">

<form action="lab_process.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Patient</label>

<select name="patient_id" class="form-select" required>

<option value="">Select Patient</option>

<?php while($row=mysqli_fetch_assoc($patients)){ ?>

<option value="<?= $row['id']; ?>">
<?= $row['patient_name']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="col-md-6 mb-3">

<label class="form-label">Doctor</label>

<select name="doctor_id" class="form-select" required>

<option value="">Select Doctor</option>

<?php while($row=mysqli_fetch_assoc($doctors)){ ?>

<option value="<?= $row['id']; ?>">
<?= $row['doctor_name']; ?>
</option>

<?php } ?>

</select>

</div>

</div>
<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Laboratory Test</label>

        <select name="test_id" class="form-select" required>
            <option value="">Select Test</option>

            <?php while($row = mysqli_fetch_assoc($tests)){ ?>
                <option value="<?= $row['id']; ?>">
                    <?= $row['test_name']; ?>
                </option>
            <?php } ?>

        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Assign Date</label>
        <input type="date"
               name="assign_date"
               class="form-control"
               value="<?= date('Y-m-d'); ?>"
               required>
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Priority</label>

        <select name="priority" class="form-select">
            <option value="Normal">Normal</option>
            <option value="Urgent">Urgent</option>
            <option value="Emergency">Emergency</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">
            <option value="Assigned">Assigned</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

</div>

<div class="mb-3">
    <label class="form-label">Remarks</label>

    <textarea
        name="remarks"
        class="form-control"
        rows="4"
        placeholder="Enter remarks here..."></textarea>
</div>

<div class="text-center">

    <button type="submit"
            class="btn btn-success px-4">
        Assign Test
    </button>

    <button type="reset"
            class="btn btn-secondary px-4">
        Reset
    </button>

</div>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>