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

<title>View Medicines | MediCore HMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link rel="stylesheet" href="../../assets/css/dashboard.css">

<style>

.table-card{
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    margin-top:25px;
}

.page-title{
    font-size:30px;
    font-weight:600;
    color:#0d6efd;
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

<li class="active"><i class="fa-solid fa-capsules"></i> Pharmacy</li>

<li>
    <a href="../laboratory/view_tests.php">
        <i class="fa-solid fa-flask-vial"></i>
        Laboratory
    </a>
</li>

<li><a href="../billing/add_bill.php"><i class="fa-solid fa-file-invoice-dollar"></i> Billing</a></li>

<li><a href="../reports/index.php"><i class="fa-solid fa-chart-line"></i> Reports</a></li>

<li><a href="../settings/index.php"><i class="fa-solid fa-gear"></i> Settings</a></li>

<li><a href="../../logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

</ul>

</aside>

<main class="main-content">

<div class="topbar">
<h2><i class="fa-solid fa-capsules"></i> View Medicines</h2>
</div>

<div class="container-fluid">

<div class="table-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<h3 class="page-title">
<i class="fa-solid fa-table"></i>
Medicine List
</h3>

<a href="add_medicine.php" class="btn btn-primary">
<i class="fa-solid fa-plus"></i>
Add Medicine
</a>

</div>

<div class="row mb-3">

<div class="col-md-4">
<input type="text" class="form-control" placeholder="Search Medicine...">
</div>

</div>

<?php
$query = "SELECT * FROM medicines ORDER BY medicine_id DESC";
$result = mysqli_query($conn, $query);
?>

<div class="table-responsive">

<table class="table table-striped table-hover">

<thead class="table-primary">

<tr>

<th>ID</th>
<th>Medicine</th>
<th>Company</th>
<th>Quantity</th>
<th>Price</th>
<th>Expiry Date</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

</tbody>
<?php

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<tr>

    <td><?= $row['medicine_id']; ?></td>

    <td><?= $row['medicine_name']; ?></td>

    <td><?= $row['company']; ?></td>

    <td><?= $row['quantity']; ?></td>

    <td>₹<?= $row['price']; ?></td>

    <td><?= $row['expiry_date']; ?></td>

    <td>

        <?php
        if($row['status'] == "Available")
        {
            echo "<span class='badge bg-success'>Available</span>";
        }
        else
        {
            echo "<span class='badge bg-danger'>Out of Stock</span>";
        }
        ?>

    </td>

    <td>

        <a href="edit_medicine.php?id=<?= $row['medicine_id']; ?>" class="btn btn-warning btn-sm">
            <i class="fa-solid fa-pen"></i>
        </a>

        <a href="delete_medicine.php?id=<?= $row['medicine_id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure you want to delete this medicine?')">

            <i class="fa-solid fa-trash"></i>

        </a>

    </td>

</tr>

<?php

    }
}
else
{
?>

<tr>

<td colspan="8" class="text-center text-danger">

No Medicines Found

</td>

</tr>

<?php
}
?>
</tbody>

</table>

</div>

</div>

</div>

</main>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const search = document.querySelector("input[type='text']");

    search.addEventListener("keyup", function () {

        let value = this.value.toLowerCase();

        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(function(row){

            row.style.display =
                row.innerText.toLowerCase().includes(value)
                ? ""
                : "none";

        });

    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>