
<?php
   session_start();

?>
<h2>Registration form</h2><br><br>
<form method="post" action="includes/register.inc.php">

        <input type="text" name='firstname' placeholder="Enter Firstname"  required><br><br>
        <input type="text" name='lastname' placeholder="Enter Lastname" required><br><br>
        <input type="text" name='username' placeholder="Enter Username" required><br><br>
        <input type="email" name='email' placeholder="Enter Email" required><br><br>
        Gender: <input type="radio" name="gender" value="male" required>male
        <input type="radio" name="gender" value="female" required>female<br><br>
        <input type="password" name='password' placeholder="Enter Password" required><br><br> 
        <input type="password" name="password_two" placeholder="Retype Password" required><br><br>
        <input type="submit" name="register" value="Register">

</form>

<?php
    
    if(isset($_GET['error'])){
           if($_GET['error']==='emptyfield'){
               echo 'please fill all input fields';
           }elseif($_GET['error']==='invalidfirstname'){
               echo 'Please enter a valid firstname';
           }elseif($_GET['error']==='invalidlastname'){
            echo 'Please enter a valid lastname';
           }elseif($_GET['error']==='invalidusername'){
            echo 'Please enter a valid username';
           }elseif($_GET['error']==='invalidemail'){
            echo 'Please enter a valid email';
           }elseif($_GET['error']==='passwordsdontmatch'){
            echo 'Passwords dont match';
           }elseif($_GET['error']==='usernametaken'){
            echo 'User with this username or email already exists';
           }elseif($_GET['error']==='stmtfailed'){
            echo 'Something went wrong';
           }

    }
?>
