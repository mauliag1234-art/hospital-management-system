<?php
session_start();
include("../../config/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f7fc;
        }

        .card{
            margin-top:40px;
            border-radius:12px;
        }

        .card-header{
            background:#0d6efd;
            color:white;
            font-size:24px;
            font-weight:bold;
        }

        .btn{
            border-radius:8px;
        }
    </style>

</head>

<body>

<div class="container">

<div class="card shadow">

<div class="card-header">
💊 Add Medicine
</div>

<div class="card-body">

<form action="medicine_process.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Medicine Name</label>

<input
type="text"
name="medicine_name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Category</label>

<input
type="text"
name="category"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Company</label>

<input
type="text"
name="company"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Batch No</label>

<input
type="text"
name="batch_no"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Manufacture Date</label>

<input
type="date"
name="manufacture_date"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Expiry Date</label>

<input
type="date"
name="expiry_date"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Quantity</label>

<input
type="number"
name="quantity"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Price</label>

<input
type="number"
step="0.01"
name="price"
class="form-control"
required>

</div>

</div>

<button
class="btn btn-success"
name="save">

Save Medicine

</button>

<a
href="view_medicines.php"
class="btn btn-secondary">

View Medicines

</a>

</form>

</div>

</div>

</div>

</body>
</html>
