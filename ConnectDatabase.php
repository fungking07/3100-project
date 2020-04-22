<?php
  //connect to database as admin
 $connect = mysqli_connect("localhost","root","","csci3100");
 //check if connected
 if(!$connect){
   //output connection error if not connected.
   echo "Connection error:". mysqli_connect_error();
 }

 session_start();

 if($_SERVER['QUERY_STRING'] == 'noname'){
   unset($_SESSION['name']);
 }

 $name = $_SESSION['name'] ?? 'Guest';
 $user_id = $_SESSION['user_id'] ?? 0;
 $signed_in = $_SESSION['signed_in'] ?? False;
 ?>
