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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<style>
body {
  margin: 0;
  font-size: 17px;
  font-family: Arial, Helvetica, sans-serif;
}

/* Chat containers */
.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container1::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container1 img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}

.form-container {
  padding: 5px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 70%;
  float: left;
  padding: 15px;
  margin: 5px 10px 22px 10px;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 20px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  float: left;
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 15px 5px 22px 5px;
  border: none;
  cursor: pointer;
  width: 100px;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

.header1 {
  position: fixed;
  z-index: 1;
  width: 100%;
  height: 60px;
  background-color: #5a924c;
}

/* Style images */
.header1 img {
  float: left;
  max-width: 60px;
  width: 100%;
  padding: 2px;
  margin-right: 20px;
  border-radius: 50%;
}

.phead{
  padding: 10px 0px;
  font-size: 23px;
  color: aliceblue;
}

.content1 {
  padding: 80px 0px;
  margin: 2px auto 0 auto;
  width: 90%;
}
</style>
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

<script>
function myFunction() {
  document.getElementById("demo").style.fontSize = "25px"; 
  document.getElementById("demo").style.color = "red";
  document.getElementById("demo").style.backgroundColor = "yellow";        
}
</script>


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

<script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
}
</script>

</body>
</html> 