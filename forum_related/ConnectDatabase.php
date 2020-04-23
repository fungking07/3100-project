<?php
  //connect to database as admin
 $connect = mysqli_connect("localhost","root","","test");
 //check if connected
 if(!$connect){
   //output connection error if not connected.
   echo "Connection error:". mysqli_connect_error();
 }
 session_start();

 ?>
