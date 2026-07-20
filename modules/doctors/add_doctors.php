<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Doctor | MediCore HMS</title>

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
            Add New Doctor
        </h2>

        <hr>

        <form action="doctor_process.php"
              method="POST"
              enctype="multipart/form-data">

            <div class="row">

                <!-- Left Side -->

                <div class="col-md-3 mb-4">

                    <div class="photo-box">

                        <img
                            id="preview"
                            src="../../assets/images/default-doctor.png"
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
                        Upload Doctor Photo
                    </div>

                </div>

                <!-- Right Side -->

                <div class="col-md-9">

                    <div class="row"></div>
                                            <div class="col-md-4 mb-3">
                            <label class="form-label">Doctor ID</label>
                            <input type="text"
                                   class="form-control"
                                   value="Auto Generated"
                                   readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Joining Date</label>
                            <input type="date"
                                   class="form-control"
                                   name="joining_date"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="full_name"
                                   placeholder="Enter Full Name"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Specialization</label>
                            <input type="text"
                                   class="form-control"
                                   name="specialization"
                                   placeholder="Cardiologist / Dentist"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text"
                                   class="form-control"
                                   name="qualification"
                                   placeholder="MBBS, MD"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Experience (Years)</label>
                            <input type="number"
                                   class="form-control"
                                   name="experience"
                                   min="0"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"
                                   class="form-control"
                                   name="phone"
                                   placeholder="Enter Phone Number"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   placeholder="doctor@example.com">
                        </div>
                                                <div class="col-md-4 mb-3">
                            <label class="form-label">Consultation Fee (₹)</label>
                            <input type="number"
                                   class="form-control"
                                   name="consultation_fee"
                                   placeholder="Enter Consultation Fee"
                                   min="0"
                                   step="0.01"
                                   required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control"
                                      name="address"
                                      rows="3"
                                      placeholder="Enter Complete Address"></textarea>
                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end mt-4">

                <a href="view_doctors.php" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Save Doctor
                </button>

            </div>

        </form>

    </div>

</div>

<script src="../../assets/js/doctor.js"></script>

</body>
</html>