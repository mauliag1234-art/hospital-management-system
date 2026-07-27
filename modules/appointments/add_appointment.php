<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Fetch Patients
$patients = mysqli_query($conn, "SELECT patient_id, full_name FROM patients ORDER BY full_name ASC");

// Fetch Doctors
$doctors = mysqli_query($conn, "SELECT doctor_id, full_name FROM doctors ORDER BY full_name ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Appointment | MediCore HMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/css/appointment.css">

</head>

<body>

<div class="container mt-5">

    <div class="appointment-card">

        <h2>
            <i class="fa-solid fa-calendar-check"></i>
            Add New Appointment
        </h2>

        <hr>

        <form action="appointment_process.php" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Patient
                    </label>

                    <select name="patient_id"
                            class="form-select"
                            required>

                        <option value="">
                            Select Patient
                        </option>

                        <?php while($row=mysqli_fetch_assoc($patients)){ ?>

                            <option value="<?= $row['patient_id']; ?>">
                                <?= $row['full_name']; ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Doctor
                    </label>

                    <select name="doctor_id"
                            class="form-select"
                            required>

                        <option value="">
                            Select Doctor
                        </option>

                        <?php while($row=mysqli_fetch_assoc($doctors)){ ?>

                            <option value="<?= $row['doctor_id']; ?>">
                                <?= $row['full_name']; ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Appointment Date
                    </label>

                    <input type="date"
                           class="form-control"
                           name="appointment_date"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Appointment Time
                    </label>

                    <input type="time"
                           class="form-control"
                           name="appointment_time"
                           required>

                </div>
                                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea class="form-control"
                              name="remarks"
                              rows="3"
                              placeholder="Enter Remarks (Optional)"></textarea>

                </div>

            </div>

            <div class="text-end mt-4">

                <a href="view_appointments.php"
                   class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left"></i>
                    Back

                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Save Appointment

                </button>

            </div>

        </form>

    </div>

</div>

<script src="../../assets/js/appointment.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>