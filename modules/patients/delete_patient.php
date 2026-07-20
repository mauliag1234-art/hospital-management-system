<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Check Patient ID
if (!isset($_GET['id'])) {
    header("Location: view_patients.php");
    exit();
}

$id = intval($_GET['id']);

// ==========================
// Get Patient Photo
// ==========================

$sql = "SELECT photo FROM patients WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {

    echo "<script>
            alert('Patient Not Found!');
            window.location='view_patients.php';
          </script>";
    exit();

}

$row = mysqli_fetch_assoc($result);
$photo = $row['photo'];

mysqli_stmt_close($stmt);

// ==========================
// Delete Photo
// ==========================

if (
    $photo != "default-patient.png" &&
    file_exists("../../uploads/patients/" . $photo)
) {
    unlink("../../uploads/patients/" . $photo);
}

// ==========================
// Delete Patient Record
// ==========================

$sql = "DELETE FROM patients WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    echo "<script>
            alert('Patient Deleted Successfully!');
            window.location='view_patients.php';
          </script>";

} else {

    echo "<script>
            alert('Failed to Delete Patient!');
            window.location='view_patients.php';
          </script>";

}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>