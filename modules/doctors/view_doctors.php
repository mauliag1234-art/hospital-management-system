<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Fetch All Doctors
$sql = "SELECT * FROM doctors ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Doctors | MediCore HMS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Doctor CSS -->
    <link rel="stylesheet" href="../../assets/css/doctor.css">

</head>

<body>

<div class="container mt-5">

    <div class="doctor-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>
                <i class="fa-solid fa-user-doctor"></i>
                Doctor List
            </h2>

            <a href="add_doctor.php" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Add Doctor
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>Photo</th>
                        <th>Doctor ID</th>
                        <th>Full Name</th>
                        <th>Specialization</th>
                        <th>Phone</th>
                        <th>Consultation Fee</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>

                    </tr>

                </thead>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td>
        <img src="../../uploads/doctors/<?php echo $row['photo']; ?>"
             alt="Doctor Photo"
             width="60"
             height="60"
             style="border-radius:50%; object-fit:cover;">
    </td>

    <td><?php echo $row['doctor_id']; ?></td>

    <td><?php echo htmlspecialchars($row['full_name']); ?></td>

    <td><?php echo htmlspecialchars($row['specialization']); ?></td>

    <td><?php echo htmlspecialchars($row['phone']); ?></td>
    <td>₹<?php echo number_format($row['consultation_fee'], 2); ?></td>

<td>
<?php if ($row['status'] == "Active") { ?>
    <span class="badge bg-success">Active</span>
<?php } else { ?>
    <span class="badge bg-danger">Inactive</span>
<?php } ?>
</td>

<td class="text-center">

<a href="edit_doctor.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">
<i class="fa-solid fa-pen"></i>
</a>

<a href="delete_doctor.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this doctor?');">
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