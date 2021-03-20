<?php
    require_once "config.php";
    session_start();
    $id = $_GET['rfp_id'];
    $currentUser = $_SESSION['login_user'];
    $sql = "SELECT ID FROM company WHERE Username ='$currentUser'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    //extracted company id 
    $companyid = $row['ID'];
    $deadline = $_POST['field1'];
    $sql2="UPDATE company_rfp SET Deadline='$deadline' WHERE Company_ID='$companyid' AND Rfp_ID='$id'";
    mysqli_query($db,$sql2);
    header("location: ../frontend-code/public/company/yetToPublish.php");

?>