<?php
include "../../config/database.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hospital Report</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            margin:30px;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:8px;
            text-align:left;
        }

        th{
            background:#007bff;
            color:white;
        }
    </style>
</head>

<body onload="window.print()">

<h1>MediCore HMS Report</h1>

<table>

<tr>
    <th>Bill ID</th>
    <th>Patient</th>
    <th>Doctor</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM billing ORDER BY bill_date DESC");

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['bill_id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td>₹<?php echo number_format($row['amount'],2); ?></td>

<td><?php echo $row['bill_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

<script>
window.print();
</script>

</body>
</html>