<?php
  //as admin from now (change in later code)
	include(ConnectDatabase.php);

  $sql = 'SELECT message,messageDateTime FROM Chatroom Order By created_at';

	//get result accoriding to the query
	$result = mysqli_query($connect,$sql);


	//fetch the result into the aoociative array format
	$msginfo = mysqli_fetch_all($result,MySQLI_ASSOC);

  //print message on screen using html below(added)

  if(isset($_POST["submit"])){
    //save the $_POST["msg"] to database
  }

 ?>


!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-size: 17px;
  font-family: Arial, Helvetica, sans-serif;
}

/* Chat containers */
.container {
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
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
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
  width: 57%;
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
  margin: 10px 5px 22px 5px;
  border: none;
  cursor: pointer;
  width: 10%;
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

.header {
  position: fixed;
  top: 0;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}

/* Style images */
.header img {
  float: left;
  max-width: 60px;
  width: 100%;
  padding: 10px;
  margin-right: 20px;
  border-radius: 50%;
}

.header h2 {
  text-align: center;
}

.content {
  padding: 70px 0;
  margin: 2px auto 0 auto;
  width: 80%;
}
</style>
</head>
<body>

<div class="header">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p> AvaterName </p>
</div>

<div class="content">
<div class="container">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p><?php  echo $msginfo[0]["message"]; ?></p>
  <span class="time-right"><?php  echo $msginfo[0]["time"]; ?></span>
</div>

<div class="container">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p><?php  echo $msginfo[1]["message"]; ?></p>
  <span class="time-right"><?php  echo $msginfo[1]["time"]; ?></span>
</div>

<div class="container darker">
  <img src="avatar2.jpg" alt="Avatar2" class="right">
  <p><?php  echo $msginfo[2]["message"]; ?></p>
  <span class="time-left"><?php  echo $msginfo[2]["time"]; ?></span>
</div>

<div class="container">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p><?php  echo $msginfo[3]["message"]; ?></p>
  <span class="time-right"><?php  echo $msginfo[3]["time"]; ?></span>
</div>

<script>
function myFunction() {
  document.getElementById("demo").style.fontSize = "25px";
  document.getElementById("demo").style.color = "red";
  document.getElementById("demo").style.backgroundColor = "yellow";
}
</script>


<div class="chat" id="myForm">
  <form action="chat.php" class="form-container" method="post">
    <button type="button" class="btn" onclick="newMsg()">c_doc</button>
    <button type="button" class="btn" onclick="newMsg()">sym</button>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <button type="submit" class="btn" onclick="newMsg()" name:"submit" value="submit">Send</button>
  </form>
</div>
</div>

<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>

</body>
</html>
