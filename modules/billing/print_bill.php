<?php
include("../../config/database.php");

if(isset($_GET['id'])){

    $bill_id = $_GET['id'];

    $sql = "SELECT * FROM billing WHERE bill_id='$bill_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

}else{
    die("Invalid Bill ID");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Medicore Hospital Bill</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="billing.css">

</head>

<body>

<div class="container mt-4">

<div class="bill-card">

<div class="hospital-header text-center">
    <img src="../../assets/images/logo.png"
         alt="MEDICORE HOSPITAL Logo"
         width="250"
         class="mb-3">
</div>

<h3 class="text-center mb-4">
Billing Receipt
</h3>
<table class="table table-bordered">

<tr>
    <th width="35%">Bill ID</th>
    <td><?php echo $row['bill_id']; ?></td>
</tr>

<tr>
    <th>Patient Name</th>
    <td><?php echo $row['patient_name']; ?></td>
</tr>

<tr>
    <th>Doctor Name</th>
    <td><?php echo $row['doctor_name']; ?></td>
</tr>

<tr>
    <th>Treatment</th>
    <td><?php echo $row['treatment']; ?></td>
</tr>

<tr>
    <th>Bill Date</th>
    <td><?php echo $row['bill_date']; ?></td>
</tr>

<tr>
    <th>Amount</th>
    <td>₹ <?php echo $row['amount']; ?></td>
</tr>

<tr>
    <th>Payment Method</th>
    <td><?php echo $row['payment_method']; ?></td>
</tr>

<tr>
    <th>Status</th>
    <td>
        <?php
        if($row['status']=="Paid"){
            echo "<span class='badge bg-success'>Paid</span>";
        }else{
            echo "<span class='badge bg-danger'>Unpaid</span>";
        }
        ?>
    </td>
</tr>

</table>

<div class="text-center mt-4">

<button class="btn btn-primary" onclick="window.print()">
🖨️ Print Bill
</button>

<a href="view_billing.php" class="btn btn-secondary">
⬅ Back
</a>

</div>
<hr>

<div class="text-center mt-4">

    <h5>Thank You for Choosing</h5>

    <h3>🏥 MEDICORE HOSPITAL</h3>

    <p><strong>Get Well Soon ❤️</strong></p>

</div>

</div>

</div>

<!-- Billing JS -->
<script src="billing.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>