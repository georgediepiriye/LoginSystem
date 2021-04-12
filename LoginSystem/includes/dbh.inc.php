<?php

   $host = 'localhost';
   $dbUsername = 'root';
   $dbPassword = '';
   $database = 'login_system';
   $port = '3308';


   $conn = mysqli_connect($host,$dbUsername,$dbPassword,$database,$port);

   if(!$conn){
       die("Connection failed: " . mysqli_connect_error());
   }