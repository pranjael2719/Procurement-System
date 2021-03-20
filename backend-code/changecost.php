<?php
require_once "config.php";
$res_id = $_GET['res_id'];
$cost= $_POST['cost'];
$sql = "UPDATE rfp_status SET Cost='$cost' WHERE Response_ID='$res_id'";
mysqli_query($db,$sql);
header("location: ../frontend-code/public/vendor/rfpstatus.php");
?>