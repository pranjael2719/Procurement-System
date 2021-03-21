<?php
require_once "config.php";
$res_id = $_GET['res_id'];
$cost= $_POST['cost'];
$sql1 = "SELECT Status FROM status WHERE Response_ID='$res_id'";
$result = mysqli_query($db,$sql1);
$row = mysqli_fetch_assoc($result);

$currentStatus = $row['Status'];

if($currentStatus!="Accepted" or $currentStatus!="Rejected" or $currentStatus!="confirmed"){
$sql = "UPDATE rfp_status SET Cost='$cost' WHERE Response_ID='$res_id'";
mysqli_query($db,$sql);
header("location: ../frontend-code/public/vendor/rfpstatus.php");
}
else{
    header("location: ../frontend-code/public/vendor/rfpstatus.php");

}
?>