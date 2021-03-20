<?php
    require 'config.php';
    session_start();

    $cost = $_POST['field1'];
    $start = $_POST['field2'];
    $end = $_POST['field3'];
    $del = $_POST['field4'];
    $currentuser = $_SESSION['login_user'];
    echo $currentuser;
    $res_id = uniqid();

    $sql = "SELECT ID FROM vendor WHERE Username='$currentuser'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    $vendorid = $row['ID'];
    echo $vendorid;
    $id = $_GET['rfp_id'];

    $sql1 = "INSERT INTO vendor_rfp values('$vendorid','$id','$res_id')";
    mysqli_query($db,$sql1);

    $sql2 = "INSERT INTO rfp_status values('$res_id','$cost','$start','$end','$del','')";
    mysqli_query($db,$sql2);

    $sql3 = "INSERT INTO status values('$res_id','Negotiate')";
    mysqli_query($db,$sql3);

    header("location: ../frontend-code/public/vendor/openrfp.php");

?>