<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// ==========================
// Auto Doctor ID
// ==========================

$sql = "SELECT doctor_id FROM doctors ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $lastID = intval(substr($row['doctor_id'], 3));

    $doctor_id = "DOC" . str_pad($lastID + 1, 4, "0", STR_PAD_LEFT);

} else {

    $doctor_id = "DOC0001";
}

// ==========================
// Get Form Data
// ==========================

$full_name = trim($_POST['full_name']);
$gender = $_POST['gender'];
$specialization = trim($_POST['specialization']);
$qualification = trim($_POST['qualification']);
$experience = intval($_POST['experience']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$consultation_fee = $_POST['consultation_fee'];
$address = trim($_POST['address']);
$joining_date = $_POST['joining_date'];
$status = $_POST['status'];

// ==========================
// Photo Upload
// ==========================

$photo = "default-doctor.png";

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    $fileName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($extension, $allowed)) {

        $newFileName = time() . "_" . rand(1000,9999) . "." . $extension;

        $uploadPath = "../../uploads/doctors/" . $newFileName;

        if (move_uploaded_file($tmpName, $uploadPath)) {

            $photo = $newFileName;
        }
    }
}

// ==========================
// Insert Doctor
// ==========================

$sql = "INSERT INTO doctors (

doctor_id,
full_name,
gender,
specialization,
qualification,
experience,
phone,
email,
consultation_fee,
address,
joining_date,
status,
photo

) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(

    $stmt,

    "sssssissdssss",

    $doctor_id,
    $full_name,
    $gender,
    $specialization,
    $qualification,
    $experience,
    $phone,
    $email,
    $consultation_fee,
    $address,
    $joining_date,
    $status,
    $photo

);

if (mysqli_stmt_execute($stmt)) {

    echo "<script>
            alert('Doctor Added Successfully!');
            window.location='view_doctors.php';
          </script>";

} else {

    echo "<script>
            alert('Failed to Add Doctor!');
            window.history.back();
          </script>";

}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>