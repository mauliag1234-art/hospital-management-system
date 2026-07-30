<?php
include("../../config/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicore Hospital - Add Billing</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Billing CSS -->
    <link rel="stylesheet" href="billing.css">
</head>

<body>

<div class="container">

    <div class="bill-card">

      <div class="hospital-header text-center">

    <img src="../../assets/images/logo.png"
         alt="MEDICORE HOSPITAL Logo"
         width="250"
         class="mb-3">

</div>

        <h3 class="text-center mb-4">Add New Bill</h3>

        <form action="bill_process.php" method="POST" onsubmit="return validateBill();">
            <!-- Patient -->
<div class="mb-3">
    <label class="form-label">Patient Name</label>
    <select name="patient_name" class="form-control" required>
        <option value="">Select Patient</option>

        <?php
        $patients = mysqli_query($conn, "SELECT full_name FROM patients");

        while($row = mysqli_fetch_assoc($patients)){
            ?>
            <option value="<?php echo $row['full_name']; ?>">
                <?php echo $row['full_name']; ?>
            </option>
            <?php
        }
        ?>
    </select>
</div>

<!-- Doctor -->
<div class="mb-3">
    <label class="form-label">Doctor Name</label>
    <select name="doctor_name" class="form-control" required>
        <option value="">Select Doctor</option>

        <?php
        $doctors = mysqli_query($conn, "SELECT full_name FROM doctors");

        while($row = mysqli_fetch_assoc($doctors)){
            ?>
            <option value="<?php echo $row['full_name']; ?>">
                <?php echo $row['full_name']; ?>
            </option>
            <?php
        }
        ?>
    </select>
</div>

<!-- Treatment -->
<div class="mb-3">
    <label class="form-label">Treatment</label>
    <input type="text" name="treatment" class="form-control" required>
</div>

<!-- Bill Date -->
<div class="mb-3">
    <label class="form-label">Bill Date</label>
    <input type="date" name="bill_date" class="form-control" required>
</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Unit Price</label>
        <input type="number" id="price" class="form-control" placeholder="Enter Price">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" id="quantity" class="form-control" value="1">
    </div>

</div>

<div class="mb-3">
    <label class="form-label">Total Amount</label>
    <input type="number" id="amount" name="amount" class="form-control" readonly>
</div>

<!-- Payment -->
<div class="mb-3">
    <label class="form-label">Payment Method</label>
    <select name="payment_method" id="payment_method" class="form-control">
        
    <option value="Cash">Cash</option>
<option value="Card">Card</option>
<option value="UPI">UPI</option>
    </select>
    <div id="upiSection" style="display:none;" class="text-center mt-4">

    <img src="../../assets/images/upi_qr.png"
         class="img-fluid rounded shadow"
         style="max-width:320px;">

</div>

</div>

<!-- Status -->
<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
        <option>Paid</option>
        <option>Unpaid</option>
    </select>
</div>

<button type="submit" class="btn btn-save">
    Save Bill
</button>
</form>

    </div>

</div>

<!-- Billing JS -->
<script src="billing.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const price = document.getElementById("price");
const quantity = document.getElementById("quantity");
const amount = document.getElementById("amount");

const payment = document.getElementById("payment_method");
const upiSection = document.getElementById("upiSection");

function calculateTotal() {
    let p = parseFloat(price.value) || 0;
    let q = parseInt(quantity.value) || 0;

    amount.value = p * q;
}

price.addEventListener("input", calculateTotal);
quantity.addEventListener("input", calculateTotal);

payment.addEventListener("change", function () {

    if (this.value === "UPI") {
        upiSection.style.display = "block";
    } else {
        upiSection.style.display = "none";
    }

});

</script>

</body>
</html>