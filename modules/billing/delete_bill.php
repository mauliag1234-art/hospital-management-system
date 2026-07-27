<?php
include("../../config/database.php");

if(isset($_GET['id'])){

    $bill_id = $_GET['id'];

    $sql = "DELETE FROM billing WHERE bill_id='$bill_id'";

    if(mysqli_query($conn,$sql)){

        echo "<script>
                alert('Bill Deleted Successfully');
                window.location='view_billing.php';
              </script>";

    }else{

        echo "Error : ".mysqli_error($conn);

    }

}else{

    echo "Invalid Bill ID";

}
?>