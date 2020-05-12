<!--
PROGRAM ConnectDatabase.php
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- all pages
PURPOSE:For connecting to the database
DATA STRUCTURES:
variable connect:for storing the connection of database
 -->
<?php
  //connect to database as admin
 $connect = mysqli_connect("localhost","root","","AcadMap");
 //check if connected
 if(!$connect){
   //output connection error if not connected.
   echo "Connection error:". mysqli_connect_error();
 }
 //start session
 session_start();
 ?>
