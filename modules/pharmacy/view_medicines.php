<?php
session_start();
include("../../config/database.php");

$sql = "SELECT * FROM medicines ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Medicines</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="pharamacy.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

<h3>Medicine List</h3>

<a href="add_medicine.php" class="btn btn-light">
Add Medicine
</a>

</div>

<div class="card-body">

<?php
if(isset($_SESSION['success']))
{
?>
<div class="alert alert-success">
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</div>
<?php
}
?>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Medicine</th>

<th>Category</th>

<th>Company</th>

<th>Batch</th>

<th>MFG</th>

<th>EXP</th>

<th>Qty</th>

<th>Price</th>

<th width="180">Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['medicine_name']; ?></td>

<td><?= $row['category']; ?></td>

<td><?= $row['company']; ?></td>

<td><?= $row['batch_no']; ?></td>

<td><?= $row['manufacture_date']; ?></td>

<td><?= $row['expiry_date']; ?></td>

<td><?= $row['quantity']; ?></td>

<td>₹<?= $row['price']; ?></td>

<td>

<a
href="edit_medicine.php?id=<?= $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete_medicine.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this medicine?')">

Delete

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

<td colspan="10" class="text-center">

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

</body>

</html>