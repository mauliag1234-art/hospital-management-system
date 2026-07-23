<?php
include("../../config/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medicore Hospital - View Billing</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Billing CSS -->
    <link rel="stylesheet" href="billing.css">

</head>

<body>

<div class="container mt-4">

    <div class="bill-card">

        <div class="hospital-header">
          <div class="hospital-header text-center">
    <img src="../../assets/images/logo.png"
         alt="MEDICORE HOSPITAL Logo"
         width="250"
         class="mb-3">
</div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3>Billing Records</h3>

            <a href="add_bill.php" class="btn btn-primary">
                ➕ Add New Bill
            </a>

        </div>

        <input
            type="text"
            id="search"
            class="form-control mb-3"
            placeholder="🔍 Search Patient Name...">

        <div class="table-responsive">

            <table class="table table-bordered table-hover text-center">

                <thead class="table-primary">

                    <tr>

                        <th>Bill ID</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Treatment</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    <?php

$sql = "SELECT * FROM billing ORDER BY bill_id DESC";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td><?php echo $row['bill_id']; ?></td>

    <td><?php echo $row['patient_name']; ?></td>

    <td><?php echo $row['doctor_name']; ?></td>

    <td><?php echo $row['treatment']; ?></td>

    <td><?php echo $row['bill_date']; ?></td>

    <td>₹ <?php echo $row['amount']; ?></td>

    <td><?php echo $row['payment_method']; ?></td>

    <td>
        <?php
        if($row['status']=="Paid"){
            echo "<span class='badge bg-success'>Paid</span>";
        }else{
            echo "<span class='badge bg-danger'>Unpaid</span>";
        }
        ?>
    </td>

    <td>

        <a href="edit_bill.php?id=<?php echo $row['bill_id']; ?>"
           class="btn btn-warning btn-sm">
           ✏️ Edit
        </a>

        <a href="delete_bill.php?id=<?php echo $row['bill_id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure?')">
           🗑 Delete
        </a>

        <a href="print_bill.php?id=<?php echo $row['bill_id']; ?>"
           class="btn btn-info btn-sm">
           🖨 Print
        </a>

    </td>

</tr>

<?php

    }

}else{

?>

<tr>
    <td colspan="9">No Billing Records Found</td>
</tr>

<?php
}
?>
                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- Billing JS -->
<script src="billing.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>