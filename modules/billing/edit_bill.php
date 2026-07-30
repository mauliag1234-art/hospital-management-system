<?php
include("../../config/database.php");

if(isset($_GET['id'])){

    $bill_id = $_GET['id'];

    $sql = "SELECT * FROM billing WHERE bill_id='$bill_id'";
    $result = mysqli_query($conn, $sql);
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

<title>Edit Bill | Medicore Hospital</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="billing.css">

</head>

<body>

<div class="container mt-4">

<div class="bill-card">

<div class="hospital-header">

<h2>🏥 MEDICORE HOSPITAL</h2>

<p>Hospital Management System</p>

</div>

<h3 class="text-center mb-4">Edit Bill</h3>

<form action="update_bill.php" method="POST">
    <input type="hidden" name="bill_id" value="<?php echo $row['bill_id']; ?>">

<div class="mb-3">
    <label class="form-label">Patient Name</label>
    <input type="text" name="patient_name" class="form-control"
        value="<?php echo $row['patient_name']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Doctor Name</label>
    <input type="text" name="doctor_name" class="form-control"
        value="<?php echo $row['doctor_name']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Treatment</label>
    <input type="text" name="treatment" class="form-control"
        value="<?php echo $row['treatment']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Bill Date</label>
    <input type="date" name="bill_date" class="form-control"
        value="<?php echo $row['bill_date']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Amount</label>
    <input type="number" name="amount" class="form-control"
        value="<?php echo $row['amount']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Payment Method</label>
    <select name="payment_method" class="form-control">

        <option value="Cash"
        <?php if($row['payment_method']=="Cash") echo "selected"; ?>>
        Cash
        </option>

        <option value="UPI"
        <?php if($row['payment_method']=="UPI") echo "selected"; ?>>
        UPI
        </option>

        <option value="Card"
        <?php if($row['payment_method']=="Card") echo "selected"; ?>>
        Card
        </option>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-control">

        <option value="Paid"
        <?php if($row['status']=="Paid") echo "selected"; ?>>
        Paid
        </option>

        <option value="Unpaid"
        <?php if($row['status']=="Unpaid") echo "selected"; ?>>
        Unpaid
        </option>

    </select>
</div>

<button type="submit" class="btn btn-success w-100">
    Update Bill
</button>
</form>

</div>

</div>

<!-- Billing JS -->
<script src="billing.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>