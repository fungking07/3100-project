<?php
  include(ConnectDatabase.php);

  $sql = 'SELECT * FROM Post Order BY PostID';
  $commentsql = 'SELECT * FROM Comment'

  //get result accoriding to the query
  $result = mysqli_query($connect,$sql);
  $commentResult = mysqli_query($connect,$commentsql);

  //fetch the result into the aoociative array format
  $Postinfo = mysqli_fetch_all($result,MySQLI_ASSOC);
  $Commentinfo = mysqli_fetch_all($commentResult,MySQLI_ASSOC);

  mysql_free_resul($result);

  if(isset($_GET["submit"])){
    //direct user to another page to write comment
    header("comment.php");
  }
  //output the post tiltle and postcontent in the html below(done partially)


  //output the comment tiltle and postcontent in the html below(not done)
  /*code skeleton of poutputinf Comment
  <?php forreach($commentinfo as comment){
    if(PostID = currentPostID){
    ?>
    <div class="container reply">
      <img src="/avatar1.jpg" alt="Avatar1">
       <p><?php echo $commentinfo[commentContent]; ?></p>
      <span class="time-right"><?php echo $commentinfo[commentDateTime]; ?></span>
    </div>
    <?php }}?>
  */
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

.container {
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

.container::after {
  content: "";
  clear: both;
  display: table;
}

.content {
  padding: 70px 0;
  margin: 2px auto 2px auto;
  width: 90%;
}

.btn1 {
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
  text-align:center;
}

.btn1:hover {
  opacity: 1;
}

</style>
</head>
<div class="header">
  <p>AcadMap</p>
</div>
<body>
    <script>
        //nodejs print $display_block;
    </script>

<div class="content">

<div class="container">
  <img src="/avatar1.jpg" alt="Avatar1">
  <h3><?php/*output tile according to PostID*/ echo  $Postinfo[PostID][Title]?></h3>
  <p><?php echo  $Postinfo[PostID][content]  ?></p>
  <span class="time-right">time1</span>
</div>

<div class="container reply">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container reply">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container reply">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p>content</p>
  <span class="time-right">time1</span>
</div>

<div class="container reply">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p>content</p>
  <span class="time-right">time1</span>
</div>
<form action="post.php" method="get">
<button type="button" class="btn1" onclick="newComm()" name="submit" value ="submit">+ new comment</button>

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
