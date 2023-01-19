<?php
   include("./php/connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
    
      $mypassword = md5($password);
    
      $sql = "SELECT Id FROM Users WHERE Email = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      echo $mypassword, "   ".$myusername, "  ";

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
        session_start();
        $_SESSION['login_user'] = $myusername;
         echo "login echo";
         header("location: profile.html");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "login no  echo";

      }
   }
?>