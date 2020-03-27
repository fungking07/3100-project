<?php
  include("ConnectDatabase.php");

  $sql = 'SELECT * FROM chat';
  $sql = 'SELECT * FROM user Order BY user_id';
  //get result accoriding to the query
  $result = mysqli_query($connect,$sql);
  $result = mysqli_query($connect,$usersql);
  /*
  SELECT * FROM chat
  WHERE user_id = user.user_id
  ORDER BY last_message_time
   */

  //fetch the result into the aoociative array format
  $chatinfo = mysqli_fetch_all($result,MySQLI_ASSOC);
  $userinfo = mysqli_fetch_all($result,MySQLI_ASSOC);

  //get certain userID and data
  /*

   */
  //output chatlist
  /*code skeleton of output Chatlist
  <?php forreach($chattinfo as chat){
    if(chat["userID"] == userID)
    ?>
    <div id="2" class="container" onclick="pagetrans()">
      <img src="/avatar2.jpg" alt="Avatar2">
       <p><?php echo $chatinfo[chatcontent]; ?></p>
      <span class="time-right"><?php echo $chattinfo[chatTime]; ?></span>
    </div>
    <?php }}?>
  */
 ?>

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
  border: 2px solid #A2E2F1;
  background-color: #B8E8F3;
  border-radius: 5px;
  padding: 10px;
  width: 100%;
  margin: 10px 10px;
  opacity: 0.8;
}

.container:hover {
  opacity: 1;
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
<body>

<div class="header">
  <p>AcadMap</p>
</div>

<div class="content">

<div id="1" class="container" onclick="pagetrans()">
  <img src="/avatar1.jpg" alt="Avatar1">
  <p>last msg</p>
  <span class="time-right">time1</span>
</div>

<div id="2" class="container" onclick="pagetrans()">
  <img src="/avatar2.jpg" alt="Avatar2">
  <p>last msg</p>
  <span class="time-right">time2</span>
</div>

<div id="3" class="container" onclick="pagetrans()">
  <img src="/avatar3.jpg" alt="Avatar3">
  <p>last msg</p>
  <span class="time-right">time3</span>
</div>

<div id="4" class="container" onclick="pagetrans()">
  <img src="/avatar4.jpg" alt="Avatar4">
  <p>last msg</p>
  <span class="time-right">time4</span>
</div>

<div id="5" class="container" onclick="pagetrans()">
  <img src="/avatar5.jpg" alt="Avatar5">
  <p>last msg</p>
  <span class="time-right">time5</span>
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
