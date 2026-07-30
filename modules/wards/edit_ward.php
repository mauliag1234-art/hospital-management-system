<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Ward ID Not Found");
}

$id = $_GET['id'];

$query = "SELECT * FROM wards WHERE ward_id='$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    die("Ward Not Found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $ward_name = $_POST['ward_name'];
    $ward_type = $_POST['ward_type'];
    $total_beds = $_POST['total_beds'];
    $available_beds = $_POST['available_beds'];
    $floor_no = $_POST['floor_no'];
    $status = $_POST['status'];

    $update = "UPDATE wards SET

    ward_name='$ward_name',
    ward_type='$ward_type',
    total_beds='$total_beds',
    available_beds='$available_beds',
    floor_no='$floor_no',
    status='$status'

    WHERE ward_id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_wards.php");
        exit();
    }
    else
    {
        echo "Update Failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Ward</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Edit Ward</h3>

</div>

<div class="card-body">

<form method="POST">
<div class="mb-3">
    <label class="form-label">Ward Name</label>
    <input type="text" name="ward_name" class="form-control"
           value="<?= $row['ward_name']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Ward Type</label>
    <select name="ward_type" class="form-select" required>

        <option value="General"
        <?= ($row['ward_type']=="General") ? "selected" : ""; ?>>
        General
        </option>

        <option value="Private"
        <?= ($row['ward_type']=="Private") ? "selected" : ""; ?>>
        Private
        </option>

        <option value="ICU"
        <?= ($row['ward_type']=="ICU") ? "selected" : ""; ?>>
        ICU
        </option>

        <option value="Emergency"
        <?= ($row['ward_type']=="Emergency") ? "selected" : ""; ?>>
        Emergency
        </option>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Total Beds</label>
    <input type="number" name="total_beds" class="form-control"
           value="<?= $row['total_beds']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Available Beds</label>
    <input type="number" name="available_beds" class="form-control"
           value="<?= $row['available_beds']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Floor Number</label>
    <input type="text" name="floor_no" class="form-control"
           value="<?= $row['floor_no']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select">

        <option value="Available"
        <?= ($row['status']=="Available") ? "selected" : ""; ?>>
        Available
        </option>

        <option value="Full"
        <?= ($row['status']=="Full") ? "selected" : ""; ?>>
        Full
        </option>

        <option value="Maintenance"
        <?= ($row['status']=="Maintenance") ? "selected" : ""; ?>>
        Maintenance
        </option>

    </select>

</div>

<button type="submit" name="update" class="btn btn-success">
    <i class="fa-solid fa-floppy-disk"></i> Update Ward
</button>

<a href="view_wards.php" class="btn btn-secondary">
    Cancel
</a>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
