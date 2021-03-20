<?php
    session_start();
require_once "config.php";
    $myusername = $mypassword = "";
    $count=0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = $_POST['email'];
        $mypassword = $_POST['password'];
        $role = $_POST['category'];
        if($role =="company"){
            $sql = "SELECT ID FROM company  WHERE Username ='$myusername' and Password='$mypassword' ";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            if($count ==1){
                
                $_SESSION['login_user'] = $myusername;
                header("location: ../frontend-code/public/company/yetToPublish.php");
            }
            else{
                $error = "Invalid Password";
                echo $error;
            }
        }
        else if($role=="vendor"){
            $sql = "SELECT ID FROM vendor  WHERE Username ='$myusername' and Password='$mypassword' ";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            if($count ==1){
                $_SESSION['login_user'] = $myusername;
                header("location: ../frontend-code/public/vendor/openrfp.php");
    
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