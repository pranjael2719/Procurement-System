<?php
require_once "config.php";
session_start();
$currentUser = $_SESSION['login_user'];
$sql = "SELECT ID FROM company WHERE Username ='$currentUser'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
//extracted compnay id 
$companyid = $row['ID'];

$sql1 = "SELECT * FROM company_rfp WHERE Company_ID='$companyid'";
$result1 = mysqli_query($db,$sql1);
if(mysqli_num_rows($result1)>0){
    while($row1=mysqli_fetch_assoc($result1)){
        echo " ".$row1['end_date']. "<br>";
    }
}

?>