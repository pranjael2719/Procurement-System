<?php
    require_once "config.php";
    $id = $_GET['rfp_id'];
    $vid = $_GET['vendor_id'];
    $sql1 = "SELECT Response_ID FROM vendor_rfp WHERE Vendor_ID='$vid' and Rfp_ID='$id'";
    $result1=mysqli_query($db,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $res_id = $row1['Response_ID'];
    $sql2 = "SELECT End_date FROM rfp_status WHERE Response_ID='$res_id'";
    $result2=mysqli_query($db,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $end= $row2['End_date'];
    $sql3 = "SELECT end_date FROM company_rfp WHERE Rfp_ID='$id'";
    $result3=mysqli_query($db,$sql3);
    $row3=mysqli_fetch_assoc($result3);
    $currend= $row3['end_date'];
    
    $sql6 = "UPDATE status SET Status = 'Rejected' WHERE Response_ID='$res_id'";
    mysqli_query($db,$sql6);
    header("location: ../frontend-code/public/company/acceptedrfp.php")
?>