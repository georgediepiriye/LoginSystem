<?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    
    if(emptyInputFieldLogin($username,$password)!==false){
        header("Location: ../login.php?status=emptyfield");
        exit();

 }

      loginUser($conn,$username,$password);



}else{
    header('Location: ../login.php');
    exit();
}

