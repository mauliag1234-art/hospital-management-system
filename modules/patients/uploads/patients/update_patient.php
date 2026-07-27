<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Get Form Data
$id = intval($_POST['id']);
$old_photo = $_POST['old_photo'];

$full_name = trim($_POST['full_name']);
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$blood_group = $_POST['blood_group'];
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$disease = trim($_POST['disease']);
$doctor = trim($_POST['doctor']);
$admission_date = $_POST['admission_date'];
$status = $_POST['status'];

// ==========================
// Photo Update
// ==========================

$photo = $old_photo;

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    $fileName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($extension, $allowed)) {

        $newFileName = time() . "_" . rand(1000,9999) . "." . $extension;

        $uploadPath = "../../uploads/patients/" . $newFileName;

        if (move_uploaded_file($tmpName, $uploadPath)) {

            if (
                $old_photo != "default-patient.png" &&
                file_exists("../../uploads/patients/" . $old_photo)
            ) {
                unlink("../../uploads/patients/" . $old_photo);
            }

            $photo = $newFileName;
        }
    }
}

// ==========================
// Update Patient
// ==========================

$sql = "UPDATE patients SET

full_name=?,
gender=?,
dob=?,
age=?,
blood_group=?,
phone=?,
email=?,
address=?,
disease=?,
doctor=?,
admission_date=?,
status=?,
photo=?

WHERE id=?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(

    $stmt,

    "sssisssssssssi",

    $full_name,
    $gender,
    $dob,
    $age,
    $blood_group,
    $phone,
    $email,
    $address,
    $disease,
    $doctor,
    $admission_date,
    $status,
    $photo,
    $id

);

if (mysqli_stmt_execute($stmt)) {

    echo "<script>
            alert('Patient Updated Successfully!');
            window.location='view_patients.php';
          </script>";

} else {

    echo "<script>
            alert('Update Failed!');
            window.history.back();
          </script>";

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>