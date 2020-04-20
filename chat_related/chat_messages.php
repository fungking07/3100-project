<?php
  // include("ConnectDatabase.php");

  // $sql = 'SELECT * FROM chat';
  // $sql = 'SELECT * FROM user Order BY user_id';
  // //get result accoriding to the query
  // $result = mysqli_query($connect,$sql);
  // $result = mysqli_query($connect,$usersql);
  // /*
  // SELECT * FROM chat
  // WHERE user_id = user.user_id
  // ORDER BY last_message_time
  //  */

  // //fetch the result into the aoociative array format
  // $chatinfo = mysqli_fetch_all($result,MySQLI_ASSOC);
  // $userinfo = mysqli_fetch_all($result,MySQLI_ASSOC);

  // if(isset($_GET["send_consult_doc"])){
  //   /*
  //   display consult_doc
  //    */
  // }
  // if(isset($_GET["user_consult_ok"])){
  //   /*
  //   go to payment_site
  //    */
  // }
  //get certain userID and data
  //output chatlist
  //code skeleton of output Chatlist
//  forreach($chattinfo as chat){
//     if(chat["userID"] == userID)
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>chat</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat_msg.css">
<link rel="stylesheet" href="../css/main.css">
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
  <p>--- WELCOME ---- TO ---- CHATROOM ---</p>
</div>

<div class="content1">

<div id="2" class="cscontainer1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar2" height="30" width="30">
  <h4> Avatar2</h4>
  <span class="time-right">time8</span>
</div>

<div id="1" class="container1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <h4> Avatar1</h4>
  <span class="time-right">time1</span>
</div>

<div id="2" class="container1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar2" height="30" width="30">
  <h4> Avatar2</h4>
  <span class="time-right">time2</span>
</div>

<div id="3" class="container1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar3" height="30" width="30">
  <h4> Avatar3</h4>
  <span class="time-right">time3</span>
</div>

<div id="4" class="container1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar4" height="30" width="30">
  <h4> Avatar4</h4>
  <span class="time-right">time4</span>
</div>

<div id="5" class="container1" onclick="pagetrans()">
  <img class="avatarname" src="../assets/avatar.png" alt="Avatar5" height="30" width="30">
  <h4> Avatar5</h4>
  <span class="time-right">time5</span>
</div>

</div>

</body>
</html>
