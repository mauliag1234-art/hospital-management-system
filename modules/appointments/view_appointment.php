<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

$query = "SELECT
            a.appointment_id,
            p.full_name AS patient_name,
            d.full_name AS doctor_name,
            a.appointment_date,
            a.appointment_time,
            a.status,
            a.remarks
          FROM appointments a
          INNER JOIN patients p
                ON a.patient_id = p.patient_id
          INNER JOIN doctors d
                ON a.doctor_id = d.doctor_id
          ORDER BY a.appointment_date DESC,
                   a.appointment_time DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>View Appointments | MediCore HMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet"
          href="../../assets/css/appointment.css">

</head>

<body>

<div class="container mt-5">

    <div class="appointment-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>
                <i class="fa-solid fa-calendar-check"></i>
                Appointment List
            </h2>

            <a href="add_appointment.php"
               class="btn btn-primary">

                <i class="fa-solid fa-plus"></i>
                Add Appointment

            </a>

        </div>

        <?php
        if(isset($_SESSION['success'])){
        ?>

            <div class="alert alert-success">

                <?= $_SESSION['success']; ?>

            </div>

        <?php
        unset($_SESSION['success']);
        }
        ?>

        <?php
        if(isset($_SESSION['error'])){
        ?>

            <div class="alert alert-danger">

                <?= $_SESSION['error']; ?>

            </div>

        <?php
        unset($_SESSION['error']);
        }
        ?>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th width="140">Action</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                    <tr>

                        <td><?= $row['appointment_id']; ?></td>

                        <td><?= htmlspecialchars($row['patient_name']); ?></td>

                        <td><?= htmlspecialchars($row['doctor_name']); ?></td>

                        <td><?= date("d-m-Y", strtotime($row['appointment_date'])); ?></td>

                        <td><?= date("h:i A", strtotime($row['appointment_time'])); ?></td>

                        <td>
                                                        <?php
                            if ($row['status'] == "Scheduled") {
                                echo '<span class="badge bg-primary">Scheduled</span>';
                            } elseif ($row['status'] == "Completed") {
                                echo '<span class="badge bg-success">Completed</span>';
                            } else {
                                echo '<span class="badge bg-danger">Cancelled</span>';
                            }
                            ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['remarks']); ?>
                        </td>

                        <td>

                            <a href="edit_appointment.php?id=<?= $row['appointment_id']; ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </a>

                            <a href="delete_appointment.php?id=<?= $row['appointment_id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this appointment?');">

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            <a href="../../dashboard.php"
               class="btn btn-secondary">

                <i class="fa-solid fa-arrow-left"></i>
                Back to Dashboard

            </a>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>