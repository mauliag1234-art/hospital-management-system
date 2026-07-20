<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

$result = mysqli_query($conn, "SELECT * FROM patients ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Patients | MediCore HMS</title>

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

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>
                <i class="fa-solid fa-hospital-user"></i>
                All Patients
            </h2>

            <a href="add_patient.php" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>
                Add Patient
            </a>

        </div>

        <hr>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                <tr>

                    <th>Photo</th>
                    <th>Patient ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>

                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                        <td width="90">

                            <img src="../../uploads/patients/<?php echo $row['photo']; ?>"
                                 width="60"
                                 height="60"
                                 style="object-fit:cover;border-radius:50%;">

                        </td>

                        <td><?php echo $row['patient_id']; ?></td>

                        <td><?php echo htmlspecialchars($row['full_name']); ?></td>

                        <td><?php echo htmlspecialchars($row['gender']); ?></td>

                        <td><?php echo htmlspecialchars($row['phone']); ?></td>

                        <td><?php echo htmlspecialchars($row['doctor']); ?></td>

                        <td>

                            <?php if($row['status']=="Admitted"){ ?>

                                <span class="badge bg-success">
                                    Admitted
                                </span>

                            <?php } else { ?>

                                <span class="badge bg-danger">
                                    Discharged
                                </span>

                            <?php } ?>

                        </td>

                        <td>

                            <a href="edit_patient.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <a href="delete_patient.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this patient?');">

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>