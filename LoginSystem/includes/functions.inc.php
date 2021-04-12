<?php


 


   //checks if firstname is invalid and returns true if its invalid  
 function invalidFirstname($firstname){
          $result= true;
         $regex = '/^[a-zA-Z]*$/';
    //checks if the given firstname does not match the regular expression    
    if(!preg_match($regex,$firstname)){   
        $result = true;
    }else{
        $result = false;
    }
    return $result;
 }


  //checks if lastname is invalid and returns true if its invalid  
function invalidLastname($lastname){
    $result= true;
    $regex = '/^[a-zA-Z]*$/';
    if(!preg_match($regex,$lastname)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


  //checks if username is invalid and returns true if its invalid  
function invalidUsername($username){
    $result= true;
    $regex = '/^[a-zA-Z0-9]*$/';
    if(!preg_match($regex,$username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

  //checks if email is invalid and returns true if its invalid  
function invalidEmail($email){
    $result= true;

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//checks if any of the input fields are empty upon submission
function emptyInputField($firstname,$lastname,$username,$email,$password,$password_two){
    $result = true;
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($password_two)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
 }

 //checks if the password and repeats password dont match are returns true if they dont
function passwordDontMatch($password,$password_two){
    $result= true;

    if($password !== $password){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

//checks if user with submitted username or email exists in the database
function userExists ($conn,$username,$email){
    $result = true;
    $sql = "select * from users where username = ? or email= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../register.php?error=stmtuserexists");
                exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
        $result = true;

    }else{
        $result = false;
       
    }
    return $result;
    mysqli_stmt_close($stmt);
 

}

//creates a new user
function createUser ($conn,$firstname,$lastname,$username,$email,$gender,$password){
    require 'dbh.inc.php';
    $sql = "insert into users(firstname,lastname,username,email,gender,hash) values(?,?,?,?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../register.php?error=stmtfailed");
                exit();
    }

    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssss",$firstname,$lastname,$username,$email,$gender,$hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: ../login.php?status=registered');
    

}
//checks if any input field is empty in login form
function emptyInputFieldLogin($username,$password){
    $result=true;
    if(empty($username) || empty($password)){
        $result = true;

    }else{
        $result = false;
    }
     return $result;
}

function loginUser($conn,$username,$password){
    $userExists = userExists($conn,$username,$username);
    if($userExists===false){
        header("Location: ../login.php?status=wrongcredential");
        exit();
    }
    
    $hashedPassword = $userExists["hash"];
    $checkedPassword = password_verify($password,$hashedPassword);
    
    if($checkedPassword === false){
        header("Location: ../login.php?status=wrongcredential");
        exit();

    }elseif($checkedPassword===true){
        session_start();
        $_SESSION['id'] = $userExists['id'];
        $_SESSION['username'] = $userExists['username'];
        header("Location: ../home.php");
        exit();

    }


    



}