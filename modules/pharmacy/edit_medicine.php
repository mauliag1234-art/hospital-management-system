<?php
session_start();
include("../../config/database.php");

if (!isset($_GET['id'])) {
    header("Location: view_medicines.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM medicines WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Medicine Not Found.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Medicine</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="pharamacy.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning text-dark">

<h3>Edit Medicine</h3>

</div>

<div class="card-body">

<form action="update_medicine.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label>Medicine Name</label>

<input
type="text"
name="medicine_name"
class="form-control"
value="<?= $row['medicine_name']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Category</label>

<input
type="text"
name="category"
class="form-control"
value="<?= $row['category']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Company</label>

<input
type="text"
name="company"
class="form-control"
value="<?= $row['company']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Batch No</label>

<input
type="text"
name="batch_no"
class="form-control"
value="<?= $row['batch_no']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Manufacture Date</label>

<input
type="date"
name="manufacture_date"
class="form-control"
value="<?= $row['manufacture_date']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Expiry Date</label>

<input
type="date"
name="expiry_date"
class="form-control"
value="<?= $row['expiry_date']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Quantity</label>

<input
type="number"
name="quantity"
class="form-control"
value="<?= $row['quantity']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Price</label>

<input
type="number"
step="0.01"
name="price"
class="form-control"
value="<?= $row['price']; ?>"
required>

</div>

</div>

<button
type="submit"
name="update"
class="btn btn-success">

Update Medicine

</button>

<a
href="view_medicines.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>