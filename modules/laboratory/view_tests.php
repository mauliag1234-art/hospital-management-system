<?php
session_start();
include("../../config/database.php");

$sql = "SELECT * FROM laboratory ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Laboratory Tests</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="laboratory.css">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

<h3 class="mb-0">Laboratory Tests</h3>

<a href="add_test.php" class="btn btn-light">
    + Add Test
</a>

</div>

<div class="card-body">

<?php
if(isset($_SESSION['success']))
{
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['error']))
{
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<input
type="text"
id="searchInput"
class="form-control mb-3"
placeholder="Search Patient / Doctor / Test">

<div class="table-responsive">

<table class="table table-bordered table-hover text-center align-middle">

<thead class="table-dark">

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

<tbody>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td><?= $row['id']; ?></td>

    <td><?= htmlspecialchars($row['patient_name']); ?></td>

    <td><?= htmlspecialchars($row['doctor_name']); ?></td>

    <td><?= htmlspecialchars($row['test_name']); ?></td>

    <td><?= $row['test_date']; ?></td>

    <td>
        <?php if($row['status'] == "Completed") { ?>
            <span class="badge bg-success">Completed</span>
        <?php } else { ?>
            <span class="badge bg-warning text-dark">Pending</span>
        <?php } ?>
    </td>

    <td>

        <a href="edit_test.php?id=<?= $row['id']; ?>"
           class="btn btn-primary btn-sm">
            Edit
        </a>

        <a href="delete_test.php?id=<?= $row['id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure you want to delete this test?');">
            Delete
        </a>

        <a href="print_report.php?id=<?= $row['id']; ?>"
           class="btn btn-success btn-sm"
           target="_blank">
            Print
        </a>

    </td>

</tr>

<?php } ?>
</tbody>

</table>

</div>

</div>

</div>

</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function () {

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        row.style.display = text.includes(filter) ? "" : "none";

    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
</tbody>