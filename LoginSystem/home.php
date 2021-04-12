<?php

if(isset($_POST['submit'])){
    session_start();
    if(isset($_SESSION['id'])){
     echo '<a href="profile.php">Profile</a><br><br>';
     echo '<a href="includes/logout.php">logout</a><br><br>';
 
     echo 'Hello there ' . $_SESSION['username'];
  }
}else{
    header("Location: login.php");
}
   
?>

