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
    <title>Edit Laboratory Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="laboratory.css">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning text-dark">
    <h3>Edit Laboratory Test</h3>
</div>

<div class="card-body">

<form action="update_test.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">
<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Patient Name</label>
        <input type="text"
               name="patient_name"
               class="form-control"
               value="<?= htmlspecialchars($row['patient_name']); ?>"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Doctor Name</label>
        <input type="text"
               name="doctor_name"
               class="form-control"
               value="<?= htmlspecialchars($row['doctor_name']); ?>"
               required>
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Test Name</label>
        <input type="text"
               name="test_name"
               class="form-control"
               value="<?= htmlspecialchars($row['test_name']); ?>"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Test Date</label>
        <input type="date"
               name="test_date"
               class="form-control"
               value="<?= $row['test_date']; ?>"
               required>
    </div>

</div>

<div class="mb-3">
    <label class="form-label">Result</label>
    <textarea name="result"
              class="form-control"
              rows="4"><?= htmlspecialchars($row['result']); ?></textarea>
</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">

            <option value="Pending"
            <?= ($row['status']=="Pending") ? "selected" : ""; ?>>
                Pending
            </option>

            <option value="Completed"
            <?= ($row['status']=="Completed") ? "selected" : ""; ?>>
                Completed
            </option>

        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Remarks</label>

        <textarea name="remarks"
                  class="form-control"
                  rows="3"><?= htmlspecialchars($row['remarks']); ?></textarea>
    </div>

</div>

<div class="text-center mt-4">

    <button type="submit" class="btn btn-success px-4">
        Update Test
    </button>

    <a href="view_tests.php" class="btn btn-secondary px-4">
        Cancel
    </a>

</div>
            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>