<!-- 
PROGRAM logout.php - logout  
PROGRAMMER: Lee Pak Hei 1155109311 Lam King Fung 1155108968 Tso Sze Long Angus 1155109296
CALLING SEQUENCE: 
- navbar.php -> logout.php
 -->
<?php
 session_start();
 session_destroy();
 header("location: forum_related/forum.php");
?>
