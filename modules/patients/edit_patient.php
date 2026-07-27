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

// Fetch Patient Details
$sql = "SELECT * FROM patients WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Patient Not Found!");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Patient | MediCore HMS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Patient CSS -->
    <link rel="stylesheet" href="../../assets/css/patient.css">

</head>

<body>

<div class="container mt-5">

    <div class="patient-card">

        <h2>
            <i class="fa-solid fa-user-pen"></i>
            Edit Patient
        </h2>

        <hr>

        <form action="update_patient.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="old_photo" value="<?php echo $row['photo']; ?>">

            <div class="row">

                <!-- Left Side -->

                <div class="col-md-3 mb-4">

                    <div class="photo-box">

                        <img id="preview"
                             src="../../uploads/patients/<?php echo $row['photo']; ?>"
                             alt="Patient Photo">

                    </div>

                    <br>

                    <input
                        type="file"
                        class="form-control"
                        id="photo"
                        name="photo"
                        accept="image/*">

                    <div class="upload-text mt-2">
                        Change Patient Photo
                    </div>

                </div>

                <!-- Right Side -->

                <div class="col-md-9">

                    <div class="row">
                                                <div class="col-md-4 mb-3">
                            <label class="form-label">Patient ID</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?php echo $row['patient_id']; ?>"
                                   readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Admission Date</label>
                            <input type="date"
                                   class="form-control"
                                   name="admission_date"
                                   value="<?php echo $row['admission_date']; ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="full_name"
                                   value="<?php echo htmlspecialchars($row['full_name']); ?>"
                                   required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="Male" <?php if($row['gender']=="Male") echo "selected"; ?>>Male</option>
                                <option value="Female" <?php if($row['gender']=="Female") echo "selected"; ?>>Female</option>
                                <option value="Other" <?php if($row['gender']=="Other") echo "selected"; ?>>Other</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Blood Group</label>
                            <input type="text"
                                   class="form-control"
                                   name="blood_group"
                                   value="<?php echo $row['blood_group']; ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date"
                                   class="form-control"
                                   id="dob"
                                   name="dob"
                                   value="<?php echo $row['dob']; ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Age</label>
                            <input type="number"
                                   class="form-control"
                                   id="age"
                                   name="age"
                                   value="<?php echo $row['age']; ?>"
                                   readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"
                                   class="form-control"
                                   name="phone"
                                   value="<?php echo $row['phone']; ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="<?php echo $row['email']; ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Assigned Doctor</label>
                            <input type="text"
                                   class="form-control"
                                   name="doctor"
                                   value="<?php echo htmlspecialchars($row['doctor']); ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Disease</label>
                            <input type="text"
                                   class="form-control"
                                   name="disease"
                                   value="<?php echo htmlspecialchars($row['disease']); ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="Admitted" <?php if($row['status']=="Admitted") echo "selected"; ?>>Admitted</option>
                                <option value="Discharged" <?php if($row['status']=="Discharged") echo "selected"; ?>>Discharged</option>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control"
                                      rows="3"
                                      name="address"><?php echo htmlspecialchars($row['address']); ?></textarea>
                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end mt-4">

                <a href="view_patients.php" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Update Patient
                </button>

            </div>

        </form>

    </div>

</div>

<script src="../../assets/js/patient.js"></script>

</body>
</html>