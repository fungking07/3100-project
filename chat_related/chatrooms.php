<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<html>
<head>
<meta HTTP-EQUIV="refresh" CONTENT="1000">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>chatroom</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/chatrooms.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/chatrooms.js"></script>
</head>
<body>


<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, 'AcadMap');

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $crmid = $_GET['id']; //parse from url?

  //find the name the person are chatting w/ u
  $sql = "SELECT * FROM chatroom,user WHERE chatroom_id=$crmid";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);
  if($_SESSION["user_id"] == $info['user_id']){
    $oppoid = $info['opponent_id'];
  }
  else{
    $oppoid = $info['user_id'];
  }
  $_SESSION["oppoid"] = $oppoid;

  $sql = "SELECT * FROM user WHERE user_id=$oppoid";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);

  echo "
  <nav class='navbar navbar-default navbar-fixed-top'>
  <div class='container'>
    <a href='#' class='navbar-brand'>AcadMap</a>
    <div class='container-fluid'>
      <ul class='nav navbar-nav'>
        <li><a href='#'>Forum</a></li>
        <li><a href='#'>Chat</a></li>
        <li><a href='#'>Consultation</a></li>
        <input type='text' placeholder='Search..'>
        <li><a href='#'>Welcome, User!</a></li>
      </ul>
    </div>
  </div>
  <div class='header1'>
  <img src='../assets/avatar.png' alt='Avatar'>
  <p class='phead'>".$info['username']."</p>
  </div>
</nav>";
?>

<div class="content1" style="margin-top:100px">
  <div id='8888'>
    <?php

      $_SESSION["crmid"] = $crmid;
      $sql = "SELECT * FROM chat WHERE chatroom_id=$crmid ORDER BY message_date_time";
      $Result = mysqli_query($conn,$sql);

      $col = mysqli_num_rows($Result);
      $myname = $_SESSION['username'];
      for ($x = 0; $x < $col; $x++) {
        $info = mysqli_fetch_array($Result);
        
        if($myname == $info['sender_name']){
          if($info['msg_type']=='normal'){
            echo "<div class=\"container1 darker\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
            <p>".$info['message']."</p>
            <span class=\"time-left\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='request'){
            echo "<div class=\"container1 darker\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
            <div class=\"containerdoc\">
              <p>Consulation Request</p>
              <form action=\"accept.php\">
                  <input class=\"btnsend\" type=\"submit\" onclick=\"history.go(0);\" value='accept'>
              </form>
              <form action=\"reject.php\">
                  <input class=\"btnsend\" type=\"submit\" onclick=\"history.go(0);\" value='decline'>
              </form>
            </div>
            <span class=\"time-left\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='accept'){
            $ccidsql = "SELECT * FROM chatroom WHERE consultroom=$crmid";
            $ccidResult = mysqli_query($conn,$ccidsql);
            $ccidinfo = mysqli_fetch_array($ccidResult);
            $ccid = $ccidinfo['chatroom_id'];
            echo "<div class=\"container1 darker\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
            <div class=\"containerdoc\">
              <p>ACCEPTED, new chatroom is created in the chatlist.</p>
              <button class=\"btnsend\" onclick=\"window.location.href='cschatrooms.php?id=$ccid'\">chatroom</button>
            </div>
            <span class=\"time-left\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='reject'){
            echo "<div class=\"container1 darker\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
            <div class=\"containerdoc\">
              <p>Sorry, your request is declined.</p>
            </div>
            <span class=\"time-left\">".$info['message_date_time']."</span>
            </div>";
          }
        }
        else{
          if($info['msg_type']=='normal'){
            echo "<div class=\"container1\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\">
            <p>".$info['message']."</p>
            <span class=\"time-right\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='request'){
            echo "<div class=\"container1\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\">
            <div class=\"containerdoc\">
              <p>Consulation Request</p>
              <form action=\"accept.php\">
                  <input class=\"btnsend\" type=\"submit\" onclick=\"history.go(0);\" value='accept'>
              </form>
              <form action=\"reject.php\">
                  <input class=\"btnsend\" type=\"submit\" onclick=\"history.go(0);\" value='decline'>
              </form>
            </div>
            <span class=\"time-right\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='accept'){
            echo "<div class=\"container1\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\">
            <div class=\"containerdoc\">
              <p>ACCEPTED, new chatroom is created in the chatlist.</p>
              <button class=\"btnsend\">chatroom</button>
            </div>
            <span class=\"time-right\">".$info['message_date_time']."</span>
            </div>";
          }
          else if($info['msg_type']=='reject'){
            echo "<div class=\"container1\">
            <img src=\"../assets/avatar.png\" alt=\"Avatar\">
            <div class=\"containerdoc\">
              <p>Sorry, your request is declined.</p>
            </div>
            <span class=\"time-right\">".$info['message_date_time']."</span>
            </div>";
          }
        }

      }
    ?>
  </div>
<div class="chat" id="myForm">

  <form action="consult.php" class="form-container">
      <input class="btn" style="margin-top:25px" type="submit" onclick="window.location.reload();" value='Consult'>
  </form>

  <form action="chatp.php" class="form-container" id='bottom'>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <input class="btn" type="submit" onclick="document.getElementById('msg').value = '';"> 
  </form>

</div>
</div>

<script>
  var auto_refresh = setInterval(function(){$('#8888').load('refresh.php');}, 20000);
</script>
</body>
</html> 
