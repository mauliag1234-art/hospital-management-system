<?php
session_start();
include("../../config/database.php");

if (!isset($_GET['id'])) {
    header("Location: view_tests.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM laboratory WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
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
    <title>Test Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="laboratory.css">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">
    <h3>Laboratory Test Results</h3>
</div>

<div class="card-body">

<form action="update_test.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">
<div class="mb-3">
    <label class="form-label">Patient Name</label>
    <input type="text" class="form-control"
           value="<?= htmlspecialchars($row['patient_name']); ?>" readonly>
</div>

<div class="mb-3">
    <label class="form-label">Doctor Name</label>
    <input type="text" class="form-control"
           value="<?= htmlspecialchars($row['doctor_name']); ?>" readonly>
</div>

<div class="mb-3">
    <label class="form-label">Test Name</label>
    <input type="text" class="form-control"
           value="<?= htmlspecialchars($row['test_name']); ?>" readonly>
</div>

<div class="mb-3">
    <label class="form-label">Test Result</label>
    <textarea name="result" class="form-control" rows="4" required><?= htmlspecialchars($row['result']); ?></textarea>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select" required>
        <option value="Pending" <?= ($row['status']=="Pending") ? "selected" : ""; ?>>
            Pending
        </option>

        <option value="Completed" <?= ($row['status']=="Completed") ? "selected" : ""; ?>>
            Completed
        </option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Doctor Remarks</label>
    <textarea name="remarks" class="form-control" rows="3"><?= htmlspecialchars($row['remarks']); ?></textarea>
</div>
<div class="text-center mt-4">

    <button type="submit" class="btn btn-success">
        Save Result
    </button>

    <a href="view_tests.php" class="btn btn-secondary">
        Back
    </a>

</div>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>