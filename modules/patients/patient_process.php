<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// ==========================
// Generate Patient ID
// ==========================

$result = mysqli_query($conn, "SELECT id FROM patients ORDER BY id DESC LIMIT 1");

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $nextId = $row['id'] + 1;

} else {

    $nextId = 1;

}

$patient_id = "PAT" . str_pad($nextId, 4, "0", STR_PAD_LEFT);

// ==========================
// Get Form Data
// ==========================

$full_name = trim($_POST['full_name']);
$gender = trim($_POST['gender']);
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
// Upload Patient Photo
// ==========================

$photo = "default-patient.png";

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    $fileName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($extension, $allowed)) {

        $newFileName = time() . "_" . rand(1000,9999) . "." . $extension;

        $uploadPath = "../../uploads/patients/" . $newFileName;

        if (move_uploaded_file($tmpName, $uploadPath)) {

            $photo = $newFileName;

        }

    }

}
// ==========================
// Insert Into Database
// ==========================

$sql = "INSERT INTO patients
(
    patient_id,
    full_name,
    gender,
    dob,
    age,
    blood_group,
    phone,
    email,
    address,
    disease,
    doctor,
    admission_date,
    status,
    photo
)
VALUES
(
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssisssssssss",
    $patient_id,
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
    $photo
);

if (mysqli_stmt_execute($stmt)) {

    echo "
    <script>
        alert('Patient Added Successfully!');
        window.location='view_patients.php';
    </script>
    ";

} else {

    echo "
    <script>
        alert('Failed to Add Patient!');
        window.history.back();
    </script>
    ";

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>