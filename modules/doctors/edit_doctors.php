<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Check Doctor ID
if (!isset($_GET['id'])) {
    header("Location: view_doctors.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch Doctor Details
$sql = "SELECT * FROM doctors WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Doctor Not Found!");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Doctor | MediCore HMS</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Doctor CSS -->
<link rel="stylesheet" href="../../assets/css/doctor.css">

</head>

<body>

<div class="container mt-5">

<div class="doctor-card">

<h2>
<i class="fa-solid fa-user-doctor"></i>
Edit Doctor
</h2>

<hr>

<form action="update_doctor.php"
method="POST"
enctype="multipart/form-data">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="hidden"
name="old_photo"
value="<?php echo $row['photo']; ?>">

<div class="row">

<!-- Left Side -->

<div class="col-md-3 mb-4">

<div class="photo-box">

<img
id="preview"
src="../../uploads/doctors/<?php echo $row['photo']; ?>"
alt="Doctor Photo">

</div>

<br>

<input
type="file"
class="form-control"
id="photo"
name="photo"
accept="image/*">

<div class="upload-text mt-2">
Change Doctor Photo
</div>

</div>

<!-- Right Side -->

<div class="col-md-9">

<div class="row">