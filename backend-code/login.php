<?php
    session_start();
    if(isset($SESSION['login'] && $SESSION['login']==true)){
        header("location:welcome.php");
        exit;
    }
require_once "config.php";
    $myusername = $mypassword = "";
    $count=0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];
        $role = $_POST['category'];
        if($role =="company"){
            $sql = "SELECT id FROM $company  WHERE Username ='$myusername' and Password='$mypassword' ";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            if($count ==1){
                session_register("myusername");
                $_SESSION['login_user'] = $myusername;
                header("location: company.php");
    
            }
            else{
                $error = "Invalid Password";
                echo $error;
            }
        }
        else if($role=="vendor"){
            $sql = "SELECT id FROM $vendor  WHERE Username ='$myusername' and Password='$mypassword' ";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            if($count ==1){
                session_register("myusername");
                $_SESSION['login_user'] = $myusername;
                header("location: vendor.php");
    
            }
            else{
                $error = "Invalid Password";
                echo $error;
            }
        }
        else{
            echo "Please select the category";
        }
       
    }
?>