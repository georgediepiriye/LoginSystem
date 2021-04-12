<?php
session_start();
?>
    <h2>Login</h2><br><br>

<form method="post" action="includes/login.inc.php">
Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES);?>" required><br><br>
Password: <input type="password" name="password" required><br> <br>
<input type="submit" name="submit" value="Login">

</form>

<?php
    if(isset($_GET['status'])){
        if($_GET['status']==='registered'){
            echo 'Registration Successful...please login';
        }elseif($_GET['status']==='emptyfield'){
            echo "Empty input field";
        }elseif($_GET['status']==='wrongcredential'){
            echo "Incorrect login information";
        }
    }
?>