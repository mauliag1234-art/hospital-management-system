<?php
session_start();
include("../../config/database.php");

if(!isset($_GET['id']))
{
    header("Location: view_tests.php");
    exit();
}

$id = mysqli_real_escape_string($conn,$_GET['id']);

$sql = "SELECT * FROM laboratory WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0)
{
    header("Location: view_tests.php");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Laboratory Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="laboratory.css">

</head>

<body>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header text-center bg-primary text-white">

<h2>Hospital Management System</h2>

<h4>Laboratory Test Report</h4>

</div>

<div class="card-body">

<table class="table table-bordered">
    <tr>
    <th width="30%">Patient Name</th>
    <td><?= htmlspecialchars($row['patient_name']); ?></td>
</tr>

<tr>
    <th>Doctor Name</th>
    <td><?= htmlspecialchars($row['doctor_name']); ?></td>
</tr>

<tr>
    <th>Test Name</th>
    <td><?= htmlspecialchars($row['test_name']); ?></td>
</tr>

<tr>
    <th>Test Date</th>
    <td><?= $row['test_date']; ?></td>
</tr>

<tr>
    <th>Result</th>
    <td><?= nl2br(htmlspecialchars($row['result'])); ?></td>
</tr>

<tr>
    <th>Status</th>
    <td>
        <?php if($row['status']=="Completed"){ ?>
            <span class="badge bg-success">Completed</span>
        <?php } else { ?>
            <span class="badge bg-warning text-dark">Pending</span>
        <?php } ?>
    </td>
</tr>

<tr>
    <th>Remarks</th>
    <td><?= nl2br(htmlspecialchars($row['remarks'])); ?></td>
</tr>

</table>
<div class="text-center mt-4 mb-3">

    <button class="btn btn-primary me-2" onclick="window.print()">
        🖨️ Print Report
    </button>

    <a href="view_tests.php" class="btn btn-secondary">
        ← Back
    </a>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>