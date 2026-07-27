<?php
session_start();
include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Invalid Report ID");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM laboratory WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
    die("Report Not Found");
}

$lab = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Laboratory Report</title>

<link rel="stylesheet" href="invoice.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="invoice">

<div class="header">

<div class="logo">

<img src="../../assets/images/logo.png">

<div>

<h1>MediCore Hospital</h1>

<p>Laboratory Test Report</p>

</div>

</div>

<div class="hospital-info">

<p><i class="fa fa-location-dot"></i> Pune, Maharashtra</p>

<p><i class="fa fa-phone"></i> +91 9529429605</p>

<p><i class="fa fa-envelope"></i> info@medicorehospital.com</p>

</div>

<div class="bill-box">

<h2>REPORT</h2>

<p>

Report ID :

<b>

LAB<?= $lab['id']; ?>

</b>

</p>

<p>

Date :

<?= $lab['test_date']; ?>

</p>

</div>

</div>

<hr>

<div class="details">

<div class="patient-box">

<h3>Patient Details</h3>

<table>

<tr>
<td>Patient Name</td>
<td><?= $lab['patient_name']; ?></td>
</tr>

<tr>
<td>Doctor Name</td>
<td><?= $lab['doctor_name']; ?></td>
</tr>

<tr>
<td>Test Name</td>
<td><?= $lab['test_name']; ?></td>
</tr>

<tr>
<td>Test Date</td>
<td><?= $lab['test_date']; ?></td>
</tr>

<tr>
<td>Status</td>
<td><?= $lab['status']; ?></td>
</tr>

<tr>
<td>Remarks</td>
<td><?= $lab['remarks']; ?></td>
</tr>

</table>

</div>

</div>

<table class="bill-table">

<thead>

<tr>

<th>Sr.</th>

<th>Test Name</th>

<th>Result</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<tr>

<td>1</td>

<td><?= $lab['test_name']; ?></td>

<td><?= $lab['result']; ?></td>

<td><?= $lab['status']; ?></td>

</tr>

</tbody>

</table>
<!-- ================= REPORT SUMMARY ================= -->

<div class="bottom-section">

<div class="notes-box">

<h3>Laboratory Notes</h3>

<p>

<b>Result:</b>

<?= $lab['result']; ?>

</p>

<br>

<h3>Remarks</h3>

<p>

<?= $lab['remarks']; ?>

</p>

<br>

<h3>Instructions</h3>

<ul>

<li>This report is computer generated.</li>

<li>Please consult your doctor for medical advice.</li>

<li>Keep this report for future reference.</li>

<li>Thank you for choosing MediCore Hospital.</li>

</ul>

</div>

<div class="qr-box">

<h3>SCAN TO VERIFY</h3>

<img src="../../assets/images/qr.png" class="qr">

<p>

Report Verification

<br>

MediCore Hospital

</p>

<div class="payment-icons">

<i class="fa-solid fa-flask"></i>

<i class="fa-solid fa-microscope"></i>

<i class="fa-solid fa-vial"></i>

</div>

</div>

<div class="amount-box">

<table>

<tr>

<td>Test Name</td>

<td><?= $lab['test_name']; ?></td>

</tr>

<tr>

<td>Result</td>

<td><?= $lab['result']; ?></td>

</tr>

<tr>

<td>Status</td>

<td><?= $lab['status']; ?></td>

</tr>

<tr>

<td>Test Date</td>

<td><?= $lab['test_date']; ?></td>

</tr>

<tr class="paid-row">

<td>Report</td>

<td>Completed</td>

</tr>

</table>

</div>

</div>

<!-- ================= FOOTER ================= -->

<div class="footer">

<div class="thanks">

<h2>Thank You!</h2>

<p>Your health is our priority.</p>

<p>24×7 Laboratory Service</p>

<h3>+91 9529429605</h3>

</div>

<div class="seal">

<img src="../../assets/images/logo.png">

<p>MediCore Hospital</p>

</div>

<div class="signature">

<img src="../../assets/images/signature.png"
     style="width:160px;height:auto;">

<p><b>Authorised Signature</b></p>

<hr>

<b>Laboratory Department</b>

<br>

MediCore Hospital

</div>

</div>

<div class="print-area">

<button onclick="window.print()">

<i class="fa fa-print"></i>

Print Report

</button>

</div>

</div>

</body>

</html>