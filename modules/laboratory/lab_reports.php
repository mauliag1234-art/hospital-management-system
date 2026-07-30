<?php
session_start();
include("../../config/database.php");

$sql = "SELECT * FROM laboratory ORDER BY test_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Laboratory Reports</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="laboratory.css">

</head>

<body>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

<h3>Laboratory Reports</h3>

<a href="add_test.php" class="btn btn-light">
    + New Test
</a>

</div>

<div class="card-body">

<input type="text"
       id="searchInput"
       class="form-control mb-3"
       placeholder="Search Patient / Doctor / Test">

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Test</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody><?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?= $row['id']; ?></td>

    <td><?= htmlspecialchars($row['patient_name']); ?></td>

    <td><?= htmlspecialchars($row['doctor_name']); ?></td>

    <td><?= htmlspecialchars($row['test_name']); ?></td>

    <td><?= $row['test_date']; ?></td>

    <td>
        <?php if($row['status']=="Completed"){ ?>
            <span class="badge bg-success">Completed</span>
        <?php } else { ?>
            <span class="badge bg-warning text-dark">Pending</span>
        <?php } ?>
    </td>

    <td>

        <a href="test_results.php?id=<?= $row['id']; ?>"
           class="btn btn-success btn-sm">
            Result
        </a>

        <a href="print_report.php?id=<?= $row['id']; ?>"
           class="btn btn-primary btn-sm">
            Print
        </a>

        <a href="delete_test.php?id=<?= $row['id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure you want to delete this report?')">
            Delete
        </a>

    </td>

</tr>

<?php } ?>

</tbody>

</tbody>

</table>

</div>

</div>

</div>

</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function () {

    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(function(row){

        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";

    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>