<?php
session_start();
include("../../config/database.php");

// Fetch Patients
 $patients = mysqli_query($conn, "SELECT patient_id, full_name FROM patients");

// Fetch Doctors
$doctors = mysqli_query($conn, "SELECT doctor_id, full_name FROM doctors");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Laboratory Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="laboratory.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add Laboratory Test</h3>
        </div>

        <div class="card-body">

            <form action="lab_process.php" method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Patient</label>

                        <select name="patient_name" class="form-select" required>

                            <option value="">Select Patient</option>

                            <?php while($patient = mysqli_fetch_assoc($patients)){ ?>

                                >"><option value="<?= $patient['full_name']; ?>">
    <?= $patient['full_name']; ?>
</option>
                                    
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Doctor</label>

                        <select name="doctor_name" class="form-select" required>

                            <option value="">Select Doctor</option>

                            <?php while($doctor = mysqli_fetch_assoc($doctors)){ ?>

                              <option value="<?= $doctor['full_name']; ?>">
    <?= $doctor['full_name']; ?>
</option>

                            <?php } ?>

                        </select>

                    </div>

                </div>
                                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Test Name</label>

                        <input type="text"
                               name="test_name"
                               class="form-control"
                               placeholder="Enter Test Name"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Test Date</label>

                        <input type="date"
                               name="test_date"
                               class="form-control"
                               value="<?= date('Y-m-d'); ?>"
                               required>
                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">Result</label>

                    <textarea name="result"
                              class="form-control"
                              rows="4"
                              placeholder="Enter Test Result"></textarea>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Status</label>

                        <select name="status"
                                class="form-select">

                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Remarks</label>

                        <textarea name="remarks"
                                  class="form-control"
                                  rows="2"
                                  placeholder="Remarks"></textarea>

                    </div>

                </div>
                                <div class="d-flex justify-content-center gap-3 mt-4">

                    <button type="submit" class="btn btn-success px-4">
                        Save Test
                    </button>

                    <button type="reset" class="btn btn-warning px-4">
                        Reset
                    </button>

                    <a href="view_tests.php" class="btn btn-secondary px-4">
                        View Tests
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>