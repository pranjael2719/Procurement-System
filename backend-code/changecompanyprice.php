<?php
require_once "config.php";
$res_id = $_GET['res_id'];
$rfp_id = $_GET['rfp_id'];
if($_POST['Neg']=="Neg"){
    $cost= $_POST['field1'];
    $sql = "UPDATE rfp_status SET company_price='$cost' WHERE Response_ID='$res_id'";
    mysqli_query($db,$sql);
    header("location: ../frontend-code/public/company/statusrfp.php?rfp_id=$rfp_id");
}
else if($_POST['Accept']=="Accept"){
    $sql1 = "UPDATE status SET Status='Accepted' WHERE Response_ID='$res_id'";
    mysqli_query($db,$sql1);
    header("location: ../frontend-code/public/company/statusrfp.php?rfp_id=$rfp_id");
}
?>