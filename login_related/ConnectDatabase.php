<!--
PROGRAM forum.php - forum
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- forum.php
- navbar.php -> forum.php
Where filter button is for sorting by date, likes and filter by category.
Where Add Post button is for accessing add post.
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
