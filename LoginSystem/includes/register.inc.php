<?php


  if(isset($_POST['register'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password =$_POST['password'];
        $password_two = $_POST['password_two'];

      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

         if(emptyInputField($firstname,$lastname,$username,$email,$password,$password_two)!==false){
                header("Location: ../register.php?error=emptyfield");
                exit();

         }


        
        if(invalidFirstname($firstname)!==false){
                header("Location: ../register.php?error=invalidfirstname");
                exit();

        }

        if(invalidLastname($lastname)!==false){
                header("Location: ../register.php?error=invalidlastname");
                exit();

        }

        if(invalidUsername($username)!==false){
                header("Location: ../register.php?error=invalidusername");
                exit();

        }

        if(invalidEmail($email)!==false){
                header("Location: ../register.php?error=invalidemail");
                exit();

        }

        if(passwordDontMatch($password,$password_two)!==false){
                header("Location: ../register.php?error=passwordsdontmatch");
                exit();

        }

        
        if(userExists($conn,$username,$email)!==false){
                header("Location: ../register.php?error=usernametaken");
                exit();

        }

        createUser($conn,$firstname,$lastname,$username,$email,$gender,$password);


          

  }
   else{
        header("Location: ../register.php");
        exit();
 }





