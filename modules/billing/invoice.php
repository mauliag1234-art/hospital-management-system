<?php
session_start();
include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Invalid Bill ID");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM billing WHERE bill_id='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
    die("Bill Not Found");
}

$bill = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>

Hospital Invoice

</title>

<link
href="invoice.css"
rel="stylesheet">

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="invoice">

<!-- ================= HEADER ================= -->

<div class="header">

<div class="logo">

<img src="../../assets/images/logo.png">

<div>

<h1>MediCore Hospital</h1>

<p>

CARE • COMPASSION • CURE

</p>

</div>

</div>

<div class="hospital-info">

<p>

<i class="fa fa-location-dot"></i>

Pune Maharashtra

</p>

<p>

<i class="fa fa-phone"></i>

+91 9529429605

</p>

<p>

<i class="fa fa-envelope"></i>

info@medicorehospital.com

</p>

<p>

<i class="fa fa-globe"></i>

www.medicorehospital.com

</p>

</div>

<div class="bill-box">

<h2>

HOSPITAL BILL

</h2>

<p>

Bill No :

<b>

<?= $bill['bill_id']; ?>

</b>

</p>

<p>

Date :

<?= date("d M Y"); ?>

</p>

</div>

</div>

<hr>

<!-- ================= DETAILS ================= -->

<div class="details">

<div class="patient-box">

<h3>

Patient Details

</h3>

<table>

<tr>
<td>Patient ID</td>
<td><?= $bill['patient_id']; ?></td>
</tr>

<tr>
<td>Patient Name</td>
<td><?= $bill['patient_name']; ?></td>
</tr>

<tr>
<td>Doctor Name</td>
<td><?= $bill['doctor_name']; ?></td>
</tr>

<tr>
<td>Treatment</td>
<td><?= $bill['treatment']; ?></td>
</tr>

<tr>
<td>Bill Date</td>
<td><?= $bill['bill_date']; ?></td>
</tr>

<tr>
<td>Payment Method</td>
<td><?= $bill['payment_method']; ?></td>
</tr>

<tr>
<td>Status</td>
<td><?= $bill['status']; ?></td>
</tr>

</table>

</div>

</div>

<!-- ================= TABLE ================= -->

<table class="bill-table">

<thead>

<tr>

<th>Sr.</th>

<th>Description</th>

<th>Qty</th>

<th>Rate</th>

<th>Amount</th>

</tr>

</thead>

<tbody>

<tr>

<td>1</td>

<td><?= $bill['treatment']; ?></td>

<td>1</td>

<td>

₹

<?= number_format($bill['amount'],2); ?>

</td>

<td>

₹

<?= number_format($bill['amount'],2); ?>

</td>

</tr>
</tbody>

</table>

<!-- ================= SUMMARY ================= -->

<div class="bottom-section">

<div class="notes-box">

<h3>

Amount In Words

</h3>

<p>

Rupees

<b>

<?= ucwords(number_format($bill['amount'],2)); ?>

</b>

Only.

</p>

<br>

<h3>

Notes

</h3>

<ul>

<li>This is a computer generated invoice.</li>

<li>Please keep this bill safely.</li>

<li>No refund after payment.</li>

<li>Thank you for choosing MediCore Hospital.</li>

</ul>

</div>

<div class="qr-box">

<h3>

SCAN TO PAY

</h3>

<img src="../../assets/images/qr.png" class="qr">

<p>

UPI ID

<br>

medicore@upi

</p>

<div class="payment-icons">

<i class="fa-brands fa-cc-visa"></i>

<i class="fa-brands fa-cc-mastercard"></i>

<i class="fa-solid fa-credit-card"></i>

</div>

</div>

<div class="amount-box">

<table>

<tr>

<td>Sub Total</td>

<td>

₹

<?= number_format($bill['amount'],2); ?>

</td>

</tr>

<tr>

<td>Discount</td>

<td>

₹ 0.00

</td>

</tr>

<tr>

<td>GST (5%)</td>

<td>

₹

<?= number_format($bill['amount']*0.05,2); ?>

</td>

</tr>

<tr class="total-row">

<td>

TOTAL

</td>

<td>

₹

<?= number_format($bill['amount']*1.05,2); ?>

</td>

</tr>

<tr class="paid-row">

<td>

PAID

</td>

<td>

₹

<?= number_format($bill['amount']*1.05,2); ?>

</td>

</tr>

<tr class="due-row">

<td>

DUE

</td>

<td>

₹ 0.00

</td>

</tr>

</table>

</div>

</div>

<!-- ================= FOOTER ================= -->

<div class="footer">

<div class="thanks">

<h2>

Thank You!

</h2>

<p>

We wish you a speedy recovery.

</p>

<p>

24×7 Emergency

</p>

<h3>

+91 9529429605

</h3>

</div>

<div class="seal">

<img src="../../assets/images/logo.png">

<p>

MediCore Hospital

</p>

</div>

<div class="signature">

    <img src="../../assets/images/signature.png"
         alt="Signature"
         style="width:170px;height:auto;">

    <br><br>

    <p><b>Authorised Signature</b></p>

    <hr>

    <b>Billing Department</b>

    <br>

    MediCore Hospital

</div>

</div>

<div class="print-area">

<button onclick="window.print()">

<i class="fa fa-print"></i>

Print Invoice

</button>

</div>

</div>

</body>

</html>