<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>consultation chatroom</title>
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
  $crmid = $_GET['id'];//parse from url?
  $_SESSION["crmid"] = $crmid;

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

  echo "<nav class='navbar navbar-default navbar-fixed-top'>";
  include("../navbar.php");
  
  echo "</div><div class='header2' style='margin-top:50px'>
      <img src='../assets/avatar.png' alt='Avatar'>
      <p class='phead'>".$info['username']."</p></div>
      </nav>";
?>

<div class="content1" style="margin-top:100px">

<div id='8888'>
<?php

  $sql = "SELECT * FROM chat WHERE chatroom_id=$crmid ORDER BY message_date_time";
  $Result = mysqli_query($conn,$sql);

  $col = mysqli_num_rows($Result);
  $myname = $_SESSION['username'];
  for ($x = 0; $x < $col; $x++) {
    $info = mysqli_fetch_array($Result);
    if($myname == $info['sender_name']){
      echo "<div class=\"container1 darker\">
      <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
      <p>".$info['message']."</p>
      <span class=\"time-left\">".$info['message_date_time']."</span>
      </div>";
    }
    else{
      echo "<div class=\"container1\">
      <img src=\"../assets/avatar.png\" alt=\"Avatar\">
      <p>".$info['message']."</p>
      <span class=\"time-right\">".$info['message_date_time']."</span>
      </div>";
    }
  }
?>
</div>
<div class="chat" id="myForm">
  <form action="end.php" class="form-container">
      <input class="btncs" style="margin-top:25px" type="submit" onclick="history.go(0);" value='End'>
  </form>

  <form action="chatp.php" class="form-container" id='bottom'>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <input class="btncs" type="submit" onclick="history.go(0);"> 
  </form>
</div>

</div>
<script>
  var auto_refresh = setInterval(function(){$('#8888').load('refresh.php');}, 1000);
</script>
</body>
</html> 
