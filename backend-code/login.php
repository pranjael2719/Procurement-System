<?php
    session_start();
    if(isset($SESSION['login'] && $SESSION['login']==true)){
        header("location:welcome.php");
        exit;
    }
$database = procurement_db;
require_once "config.php";
    $myusername = $mypassword = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];
    
        $sql = "SELECT id FROM $database  WHERE Username ='$myusername' and Password='$mypassword' ";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        if($count ==1){
            session_register("myusername");
            $_SESSION['login_user'] = $username;
            header("location: welcome.php");

        }
        else{
            $error = "Invalid Password";
            echo $error;
        }
    }
?>