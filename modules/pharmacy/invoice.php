<?php
session_start();
include "../../config/database.php";

if (!isset($_GET['id'])) {
    die("Invalid Medicine ID");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM medicines WHERE medicine_id='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==0){
    die("Medicine Not Found");
}

$medicine = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Medicine Invoice</title>

<link rel="stylesheet" href="invoice.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="invoice">

<!-- HEADER -->

<div class="header">

<div class="logo">

<img src="../../assets/images/logo.png">

<div>

<h1>MediCore Hospital</h1>

<p>Medicine Invoice</p>

</div>

</div>

<div class="hospital-info">

<p><i class="fa fa-location-dot"></i> Pune, Maharashtra</p>

<p><i class="fa fa-phone"></i> +91 9529429605</p>

<p><i class="fa fa-envelope"></i> info@medicorehospital.com</p>

</div>

<div class="bill-box">

<h2>INVOICE</h2>

<p>

Invoice No :

<b>

MED<?= $medicine['medicine_id']; ?>

</b>

</p>

<p>

Date :

<?= date("d-m-Y"); ?>

</p>

</div>

</div>

<hr>

<!-- MEDICINE DETAILS -->

<div class="details">

<div class="patient-box">

<h3>

Medicine Details

</h3>

<table>

<tr>
<td>Medicine ID</td>
<td><?= $medicine['medicine_id']; ?></td>
</tr>

<tr>
<td>Medicine Name</td>
<td><?= $medicine['medicine_name']; ?></td>
</tr>

<tr>
<td>Company</td>
<td><?= $medicine['company']; ?></td>
</tr>

<tr>
<td>Available Qty</td>
<td><?= $medicine['quantity']; ?></td>
</tr>

<tr>
<td>Price</td>
<td>₹ <?= number_format($medicine['price'],2); ?></td>
</tr>

<tr>
<td>Status</td>
<td><?= $medicine['status']; ?></td>
</tr>

<tr>
<td>Expiry Date</td>
<td><?= $medicine['expiry_date']; ?></td>
</tr>

</table>

</div>

</div>

<!-- TABLE -->

<table class="bill-table">

<thead>

<tr>

<th>Sr.</th>

<th>Medicine</th>

<th>Qty</th>

<th>Rate</th>

<th>Total</th>

</tr>

</thead>

<tbody>

<tr>

<td>1</td>

<td><?= $medicine['medicine_name']; ?></td>

<td><?= $medicine['quantity']; ?></td>

<td>₹ <?= number_format($medicine['price'],2); ?></td>

<td>

₹ <?= number_format($medicine['quantity'] * $medicine['price'],2); ?>

</td>

</tr>

</tbody>

</table>
<!-- ================= SUMMARY ================= -->

<div class="bottom-section">

<div class="notes-box">

<h3>Amount In Words</h3>

<p>

Rupees

<b>

<?= number_format($medicine['quantity'] * $medicine['price'],2); ?>

</b>

Only.

</p>

<br>

<h3>Notes</h3>

<ul>

<li>This is a computer generated invoice.</li>

<li>Please keep this invoice for future reference.</li>

<li>Medicine once sold will not be returned.</li>

<li>Thank you for choosing MediCore Hospital.</li>

</ul>

</div>

<div class="qr-box">

<h3>SCAN TO PAY</h3>

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

₹ <?= number_format($medicine['quantity'] * $medicine['price'],2); ?>

</td>

</tr>

<tr>

<td>Discount</td>

<td>₹ 0.00</td>

</tr>

<tr>

<td>GST (5%)</td>

<td>

₹ <?= number_format(($medicine['quantity'] * $medicine['price']) * 0.05,2); ?>

</td>

</tr>

<tr class="total-row">

<td>TOTAL</td>

<td>

₹ <?= number_format(($medicine['quantity'] * $medicine['price']) * 1.05,2); ?>

</td>

</tr>

<tr class="paid-row">

<td>PAID</td>

<td>

₹ <?= number_format(($medicine['quantity'] * $medicine['price']) * 1.05,2); ?>

</td>

</tr>

<tr class="due-row">

<td>DUE</td>

<td>₹ 0.00</td>

</tr>

</table>

</div>

</div>

<!-- ================= FOOTER ================= -->

<div class="footer">

<div class="thanks">

<h2>Thank You!</h2>

<p>Your health is our priority.</p>

<p>24×7 Emergency</p>

<h3>+91 9529429605</h3>

</div>

<div class="seal">

<img src="../../assets/images/logo.png">

<p>MediCore Hospital</p>

</div>

<div class="signature">

    <img src="../../assets/images/signature.png"
         alt="Signature"
         style="width:170px;height:auto;display:block;margin:0 auto;">

    <br>

    <p><b>Authorised Signature</b></p>

    <hr>

    <b>Pharmacy Department</b>

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