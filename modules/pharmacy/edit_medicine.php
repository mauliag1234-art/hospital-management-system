<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Medicine ID Not Found");
}

$id = $_GET['id'];

$query = "SELECT * FROM medicines WHERE medicine_id='$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    die("Medicine Not Found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $medicine_name = $_POST['medicine_name'];
    $company = $_POST['company'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expiry_date = $_POST['expiry_date'];
    $status = $_POST['status'];

    $update = "UPDATE medicines SET

    medicine_name='$medicine_name',
    company='$company',
    quantity='$quantity',
    price='$price',
    expiry_date='$expiry_date',
    status='$status'

    WHERE medicine_id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location:view_medicines.php");
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

<title>Edit Medicine</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Edit Medicine</h3>

</div>

<div class="card-body">

<form method="POST">
    <div class="mb-3">
    <label class="form-label">Medicine Name</label>
    <input type="text" name="medicine_name" class="form-control"
           value="<?= $row['medicine_name']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Company</label>
    <input type="text" name="company" class="form-control"
           value="<?= $row['company']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control"
           value="<?= $row['quantity']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control"
           value="<?= $row['price']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Expiry Date</label>
    <input type="date" name="expiry_date" class="form-control"
           value="<?= $row['expiry_date']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select">

        <option value="Available"
        <?= ($row['status']=="Available") ? "selected" : ""; ?>>
        Available
        </option>

        <option value="Out of Stock"
        <?= ($row['status']=="Out of Stock") ? "selected" : ""; ?>>
        Out of Stock
        </option>

    </select>

</div>

<button type="submit" name="update" class="btn btn-success">
    <i class="fa-solid fa-floppy-disk"></i> Update Medicine
</button>

<a href="view_medicines.php" class="btn btn-secondary">
    Cancel
</a>
</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>