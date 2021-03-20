<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $category = mysqli_real_escape_string($db,$_POST['category']); 
      if($category=="company") {
        $id = uniqid();
        if(!mysqli_query($db,"INSERT INTO company VALUES ('$id','$myusername','$mypassword')")){
            echo "Credentials are not properly entered";
        }
        header("location: login.php");
      }
      elseif($category=="vendor") {
        $id = uniqid();
        if(!mysqli_query($db,"INSERT INTO vendor VALUES ('$id','$myusername','$mypassword')")){
            echo "Credentials are not properly entered";
        }
        header("location: login.php");
     }
   }
?>
