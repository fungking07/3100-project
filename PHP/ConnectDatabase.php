<?php
  //connect to database as admin
 $connect = mysqli_connect("localhost","admin1","password","csci3100");
 //check if connected
 if(!$connect){
   //output connection error if not connected.
   echo "Connection error:". mysqli_connect_error();
 }
 ?>
