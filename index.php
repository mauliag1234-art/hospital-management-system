<?php
session_start();

// जर user आधीच login असेल तर Dashboard वर पाठव
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

// नाहीतर Login Page वर पाठव
header("Location: login.php");
exit();
?>