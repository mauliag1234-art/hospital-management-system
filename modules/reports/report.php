<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

include "../../config/database.php";

// Total Patients
$patients = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM patients")
)['total'];

// Total Doctors
$doctors = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM doctors")
)['total'];

// Admitted Patients
$admitted = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM patients WHERE status='Admitted'")
)['total'];

// Discharged Patients
$discharged = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM patients WHERE status='Discharged'")
)['total'];

// Total Appointments
$appointments = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM appointments")
)['total'];

// Total Revenue
$revenue = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT SUM(amount) AS total FROM billing")
)['total'];

if (!$revenue) {
    $revenue = 0;
}

// Monthly Revenue
$monthlyRevenue = [];

for ($i = 1; $i <= 12; $i++) {

    $result = mysqli_fetch_assoc(
        mysqli_query(
            $conn,
            "SELECT SUM(amount) AS total FROM billing WHERE MONTH(bill_date) = $i"
        )
    );

    $monthlyRevenue[] = $result['total'] ?? 0;
}

$from = $_GET['from'] ?? '';
$to = $_GET['to'] ?? '';


$recentAppointments = mysqli_query($conn,"
SELECT
a.appointment_id,
p.full_name AS patient_name,
d.full_name AS doctor_name,
a.appointment_date,
a.status
FROM appointments a
LEFT JOIN patients p ON a.patient_id = p.patient_id
LEFT JOIN doctors d ON a.doctor_id = d.doctor_id
ORDER BY a.appointment_date DESC
LIMIT 5
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediCore HMS | Reports</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="../../assets/css/dashboard.css">

</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->

    <aside class="sidebar">

        <div class="logo">

            <i class="fa-solid fa-hospital"></i>

            <h2>MediCore HMS</h2>

        </div>

      <ul>

    <li class="active">
        <a href="report.php">
            <i class="fa-solid fa-chart-line"></i>
            Reports
        </a>
    </li>

    <li>
        <a href="../patients/add_patient.php">
            <i class="fa-solid fa-user-injured"></i>
            Patients
        </a>
    </li>

    <li>
        <a href="../doctors/add_doctors.php">
            <i class="fa-solid fa-user-doctor"></i>
            Doctors
        </a>
    </li>

    <li>
        <a href="../appointments/add_appointment.php">
            <i class="fa-solid fa-calendar-check"></i>
            Appointments
        </a>
    </li>

    <li>
        <a href="../pharmacy/view_medicines.php">
            <i class="fa-solid fa-capsules"></i>
            Pharmacy
        </a>
    </li>

    <li>
        <a href="../laboratory/add_test.php">
            <i class="fa-solid fa-flask-vial"></i>
            Laboratory
        </a>
    </li>

    <li>
        <a href="../wards/add_ward.php">
            <i class="fa-solid fa-bed"></i>
            Ward
        </a>
    </li>

    <li>
        <a href="../billing/add_bill.php">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            Billing
        </a>
    </li>

    <li>
        <a href="../settings/index.php">
            <i class="fa-solid fa-gear"></i>
            Settings
        </a>
    </li>

    <li>
        <a href="../../logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>
    </li>

</ul>

    </aside>

    <!-- Main -->

    <main class="main-content">

        <div class="topbar">
<h2>
    Welcome, <?php echo $_SESSION['admin_name']; ?>
</h2>

<p class="text-muted mb-0">
    Hospital Analytics & Reports
</p>

     <div class="card-grid">

    <!-- Patients -->
    <div class="dashboard-card">
        <i class="fa-solid fa-user-injured"></i>
        <h5>Total Patients</h5>
        <h2><?php echo $patients; ?></h2>
    </div>
    <div class="card p-3 mb-4">

<form method="GET" class="row g-3">

<div class="col-md-4">
<label>From Date</label>
<input type="date" name="from" class="form-control"
       value="<?php echo $from; ?>">
</div>

<div class="col-md-4">
<label>To Date</label>
<input type="date" name="to" class="form-control"
       value="<?php echo $to; ?>">
</div>

<div class="col-md-4 d-flex align-items-end">
<button class="btn btn-primary w-100">
<i class="fa-solid fa-filter"></i>
Filter
</button>
</div>

</form>

</div>

<div class="d-flex justify-content-end gap-2 mb-4">

<a href="print_report.php" target="_blank" class="btn btn-primary">
<i class="fa-solid fa-print"></i> Print
</a>

<a href="export_pdf.php" class="btn btn-danger">
<i class="fa-solid fa-file-pdf"></i> PDF
</a>

<a href="export_excel.php" class="btn btn-success">
<i class="fa-solid fa-file-excel"></i> Excel
</a>

</div>

    <!-- Doctors -->
    <div class="dashboard-card">
        <i class="fa-solid fa-user-doctor"></i>
        <h5>Total Doctors</h5>
        <h2><?php echo $doctors; ?></h2>
    </div>

    <!-- Appointments -->
    <div class="dashboard-card">
        <i class="fa-solid fa-calendar-check"></i>
        <h5>Total Appointments</h5>
        <h2><?php echo $appointments; ?></h2>
    </div>

    <!-- Revenue -->
    <div class="dashboard-card">
        <i class="fa-solid fa-indian-rupee-sign"></i>
        <h5>Total Revenue</h5>
        <h2>₹<?php echo number_format($revenue); ?></h2>
    </div>

</div>

<!-- Charts Section -->
<div class="row mt-4">

    <div class="col-lg-6 mb-4">
        <div class="dashboard-card">
            <h4 class="mb-3">Patient Statistics</h4>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="dashboard-card">
            <h4 class="mb-3">Hospital Analytics</h4>
            <canvas id="barChart"></canvas>
        </div>
    </div>
 <div class="table-container">

<h3>Recent Bills</h3>

<table class="table table-bordered table-striped">

<thead class="table-primary">
<tr>
<th>Bill ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Amount</th>
<th>Date</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php while($bill = mysqli_fetch_assoc($recentBills)){ ?>

<tr>
<td><?= $bill['bill_id']; ?></td>
<td><?= $bill['patient_name']; ?></td>
<td><?= $bill['doctor_name']; ?></td>
<td>₹<?= number_format($bill['amount'],2); ?></td>
<td><?= $bill['bill_date']; ?></td>
<td><?= $bill['status']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>
</div>
<div class="table-container mt-4">

<h3>Recent Appointments</h3>

<table class="table table-bordered table-striped">

<thead class="table-success">

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Appointment Date</th>
<th>Status</th>
</tr>

</thead>

<tbody>

<?php while($app = mysqli_fetch_assoc($recentAppointments)){ ?>

<tr>

<td><?= $app['appointment_id']; ?></td>
<td><?= $app['patient_name']; ?></td>
<td><?= $app['doctor_name']; ?></td>
<td><?= $app['appointment_date']; ?></td>
<td><?= $app['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const patients = <?php echo $patients; ?>;
const doctors = <?php echo $doctors; ?>;
const appointments = <?php echo $appointments; ?>;
const revenue = <?php echo $revenue; ?>;
const monthlyRevenue = <?php echo json_encode($monthlyRevenue); ?>;
const admitted = <?php echo $admitted; ?>;
const discharged = <?php echo $discharged; ?>;

console.log("Patients =", patients);
console.log("Doctors =", doctors);
console.log("Appointments =", appointments);
console.log("Revenue =", revenue);
console.log("Monthly Revenue =", monthlyRevenue);
console.log("Admitted =", admitted);
console.log("Discharged =", discharged);
</script>

<script src="report.js"></script>


</body>
</html>