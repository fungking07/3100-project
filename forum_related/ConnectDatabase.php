<!-- 
PROGRAM ConnectDatabase.php - helper function to connect the database
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE: 
- Most of the php file require to call it.
- shortest path: login.php -> ConnectDatabase.php -> forum.php
 -->
<?php
  //connect to database as admin
 $connect = mysqli_connect("localhost","root","","AcadMap");
 //check if connected
 if(!$connect){
   //output connection error if not connected.
   echo "Connection error:". mysqli_connect_error();
 }

 session_start();
?>