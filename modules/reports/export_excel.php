<?php
include "../../config/database.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Hospital_Report_" . date("Ymd_His") . ".xls");

echo "<table border='1'>";
echo "<tr style='background:#0d6efd;color:white;'>
        <th>Patient Name</th>
        <th>Doctor</th>
        <th>Appointment Date</th>
        <th>Bill Amount</th>
        <th>Patient Status</th>
      </tr>";

$sql = "
SELECT
    p.name AS patient_name,
    d.name AS doctor_name,
    a.appointment_date,
    IFNULL(b.amount,0) AS amount,
    p.status
FROM patients p
LEFT JOIN appointments a
    ON p.id = a.patient_id
LEFT JOIN doctors d
    ON a.doctor_id = d.id
LEFT JOIN billing b
    ON p.id = b.patient_id
ORDER BY a.appointment_date DESC
";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";

    echo "<td>".$row['patient_name']."</td>";
    echo "<td>".$row['doctor_name']."</td>";
    echo "<td>".$row['appointment_date']."</td>";
    echo "<td>".$row['amount']."</td>";
    echo "<td>".$row['status']."</td>";

    echo "</tr>";
}

echo "</table>";
?>