<?php
  //as admin from now (change in later code)
	include(ConnectDatabase.php);

  $sql = 'SELECT message,message_date_time FROM chat Order By last_message_time';

	//get result accoriding to the query
	$result = mysqli_query($connect,$sql);


	//fetch the result into the aoociative array format
	$msginfo = mysqli_fetch_all($result,MySQLI_ASSOC);

  //print message on screen using html below(added)

  if(isset($_POST["submit"])){
    //save the $_POST["msg"] to database
  }

 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>Forum skeleton</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/chatrooms.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/chatrooms.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="#" class="navbar-brand">AcadMap</a>
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="#">Forum</a></li>
        <li><a href="#">Chat</a></li>
        <li><a href="#">Consultation</a></li>
        <input type="text" placeholder="Search..">
        <li><a href="#">Welcome, User!</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="header1">
  <img src="../assets/avatar.png" alt="Avatar1">
  <p class="phead"> AvaterName </p>
</div>

<div class="content1">
<div class="container1">
  <img src="../assets/avatar.png" alt="Avatar1">
  <p>content1</p>
  <span class="time-right">time1</span>
</div>

<div class="container1">
  <img src="../assets/avatar.png" alt="Avatar1">
  <p>content1</p>
  <span class="time-right">time2</span>
</div>

<div class="container1 darker">
  <img src="../assets/avatar.png" alt="Avatar2" class="right">
  <p>content2</p>
  <span class="time-left">time3</span>
</div>

<div class="container1">
  <img src="../assets/avatar.png" alt="Avatar1">
  <p>content1</p>
  <span class="time-right">time4</span>
</div>

<div class="container1 darker">
  <img src="../assets/avatar.png" alt="Avatar2" class="right">
  <div class="containerdoc">
    <p>Request Document</p>
  </div>
  <span class="time-left">time3</span>
</div>

<div class="container1">
  <img src="../assets/avatar.png" alt="Avatar1">
  <div class="containerdoc">
    <p>Consult Document</p>
    <button class="btnsend">grade</button>
  </div>
  <span class="time-right">time4</span>
</div>

<div class="chat" id="myForm">
  <form action="/action_page.php" class="form-container">
    <button type="button" class="btn" onclick="consult()">
      <img src="../assets/consult.png" alt="consult height="30" width="30">
    </button>
    <button type="button" class="btn" onclick="document()">
      <img src="../assets/document.png" alt="document" height="30" width="30">
    </button>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <button type="submit" class="btn" onclick="newMsg()">
      <img src="../assets/send.svg" alt="send" height="30" width="30">
    </button>
  </form>
</div>
</div>


</body>
</html> 
