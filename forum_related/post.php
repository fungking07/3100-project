<?php
  include(ConnectDatabase.php);

  $sql = 'SELECT * FROM post Order BY post_id';
  $commentsql = 'SELECT * FROM comment'

  //get result accoriding to the query
  $result = mysqli_query($connect,$sql);
  $commentResult = mysqli_query($connect,$commentsql);
  /*
  $comment_sql = 'SELECT * FROM comment
  WHERE post.post_id = comment.post_id
  ORDER BY comment.comment_id'
  //end of sql
  //output $post_comment_sql
  */

  //fetch the result into the aoociative array format
  $Postinfo = mysqli_fetch_all($result,MySQLI_ASSOC);
  $Commentinfo = mysqli_fetch_all($commentResult,MySQLI_ASSOC);

  mysql_free_resul($result);

  if(isset($_GET["submit"])){
    //direct user to another page to write comment
    header("comment.php");
  }
  //output the post_title and post_content in the html below(done partially)


  //output the post_title and post_content in the html below(not done)
  /*code skeleton of poutputinf Comment

  //php way
  <?php forreach($commentinfo as comment){
    if(post_id = current_post_id){
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

.header {
  position: fixed;
  top: 0;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}

.time-right {
  float: right;
  color: #aaa;
}

.container1 {
  border: 2px solid #6CDDC0;
  background-color: #84ECD1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.reply {
  border-color: #6FB6A4;
  background-color: #B7D7CF;
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.form-container {
  padding: 5px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 90%;
  float: left;
  padding: 15px;
  margin: 0px;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 20px;
}

.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

.content1 {
  padding: 0;
  margin: 2px auto 2px auto;
  width: 90%;
}

.btn2 {
  float: left;
  font-size: 17px;
  background-color: rgb(76, 175, 167);
  color: white;
  padding: 16px;
  margin: 10px;
  border: none;
  cursor: pointer;
  width: 8%;
  margin-bottom:10px;
  opacity: 0.8;
  text-align:center;
}

.btn1:hover, .btn2:hover {
  opacity: 1;
}

.left{
  float: left;
}

.name{
  padding: 5px 0px 0px 30px;
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

<div class="content1">

<div class="container1">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 1</p>
  <h3><?php/*output tile according to PostID*/ echo  $Postinfo[PostID][Title]?></h3>
  <p><?php echo  $Postinfo[PostID][content]  ?></p>
  <span class="time-right">time1</span>
</div>

<div class="container1 reply">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 2</p>
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container1 reply">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 1</p>
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container1 reply">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 3</p>
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container1 reply">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 2</p>
  <p>content</p>
  <span class="time-right">time1</span>
</div>
<form action="/action_page.php" class="form-container">
  <textarea placeholder="Type message.." name="msg" required></textarea>
</form>
<button type="submit" class="btn2" onclick="newMsg()">
  <img src="../assets/send.svg" alt="send" height="30" width="30">
</button>


</div>

<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
}

function newComm(){
  var popup = document.getElementById("mewComm");
  popup.classList.toggle("show");
}
</script>

</body>
</html>
