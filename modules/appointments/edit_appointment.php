<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (!isset($_GET['id'])) {
    header("Location: view_appointment.php");
    exit();
}

$id = (int)$_GET['id'];

$query = "SELECT * FROM appointments WHERE appointment_id='$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: view_appointment.php");
    exit();
}

$appointment = mysqli_fetch_assoc($result);

$patients = mysqli_query($conn,
    "SELECT patient_id, full_name FROM patients ORDER BY full_name ASC");

$doctors = mysqli_query($conn,
    "SELECT doctor_id, full_name FROM doctors ORDER BY full_name ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Appointment | MediCore HMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet"
href="../../assets/css/appointment.css">

</head>

<body>

<div class="container mt-5">

<div class="appointment-card">

<h2>
<i class="fa-solid fa-pen-to-square"></i>
Edit Appointment
</h2>

<hr>

<form action="update_appointment.php" method="POST">

<input type="hidden"
name="appointment_id"
value="<?= $appointment['appointment_id']; ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Patient</label>

<select name="patient_id"
class="form-select"
required>

<?php while($p=mysqli_fetch_assoc($patients)){ ?>

<option
value="<?= $p['patient_id']; ?>"
<?= ($appointment['patient_id']==$p['patient_id']) ? 'selected' : ''; ?>>

<?= htmlspecialchars($p['full_name']); ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Doctor</label>

<select name="doctor_id"
class="form-select"
required>

<?php while($d=mysqli_fetch_assoc($doctors)){ ?>

<option
value="<?= $d['doctor_id']; ?>"
<?= ($appointment['doctor_id']==$d['doctor_id']) ? 'selected' : ''; ?>>

<?= htmlspecialchars($d['full_name']); ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Appointment Date</label>

<input type="date"
class="form-control"
name="appointment_date"
value="<?= $appointment['appointment_date']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Appointment Time</label>

<input type="time"
class="form-control"
name="appointment_time"
value="<?= $appointment['appointment_time']; ?>"
required>

</div>
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="Scheduled"
                            <?= ($appointment['status'] == 'Scheduled') ? 'selected' : ''; ?>>
                            Scheduled
                        </option>

                        <option value="Completed"
                            <?= ($appointment['status'] == 'Completed') ? 'selected' : ''; ?>>
                            Completed
                        </option>

                        <option value="Cancelled"
                            <?= ($appointment['status'] == 'Cancelled') ? 'selected' : ''; ?>>
                            Cancelled
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea class="form-control"
                              name="remarks"
                              rows="3"
                              placeholder="Enter Remarks"><?= htmlspecialchars($appointment['remarks']); ?></textarea>

                </div>

            </div>

            <div class="text-end mt-4">

                <a href="view_appointment.php"
                   class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left"></i>
                    Back

                </a>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fa-solid fa-floppy-disk"></i>
                    Update Appointment

                </button>

            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>