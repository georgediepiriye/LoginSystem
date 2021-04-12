
<?php
 session_start();
  if(isset($_SESSION['id'])){
     header("Location: home.php");
  }else{
      echo "<a href='login.php'>Login</a><br><br>";
    echo "<a href='register.php'>Register</a><br><br>";
  }

?>
