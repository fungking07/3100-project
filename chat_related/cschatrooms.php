<!-- 
PROGRAM cschatrooms.php - display and transmit chatroom messages in a one-to-one chatroom
                         - allow consultee to rate / comment for the consultation
PROGRAMMER: Chung Tsz Ting 115511028
CALLING SEQUENCE: 
- a block in chat_messages.php -> cschatrooms.php -> end button -> end.php -> chatrooms.php
- a block in chat_messages.php -> cschatrooms.php -> submit button -> chatp.php -> chatrooms.php
Where a block in chat_messages.php
 -->
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
<style>
.btncs2 {
  background-color: #4CAF50;
  color: white;
  width: 100px;
  border: none;
  border-radius: 5%;
  font-size: 16px;
  margin-top: 5px;
  opacity: 0.8;
}
.btncs2:hover {
  opacity: 1;
}
</style>

<?php
  session_start();
  if(isset($_SESSION['signed_in']) == false){
    echo "<script> 
    window.location.href='/403.php';
    </script>";
  }
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
  $sql = "SELECT * FROM chatroom WHERE chatroom_id=$crmid";
  $Result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($Result) == 0) {
    header("Location: ../404.php");
  }
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
      <p class='phead'>Consultation Chatroom: ".$info['username']."</p></div>
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
  <div class = "col-md-2">
    <form action="end.php" class="form-container">
      <select style='width:100px' name = "score" class='inputbox'>
        <option style="display: none;" value =""></option>
        <option value ="0">0</option>
        <option value ="1">1</option>
        <option value ="2">2</option>
        <option value ="3">3</option>
        <option value ="4">4</option>
        <option value ="5">5</option>
      </select>
        <input style='font-size:16px; margin-top:5px;' type='text' size="10" name="comment" placeholder='comment'> 
        <input style='font-size:16px;' type="submit" class='btncs2' onclick="history.go(0);" value='End'>
    </form>
  </div>
  <div class="col-md-10">
    <form action="chatp.php" class="form-container" id='bottom'>
      <textarea placeholder="Type message.." name="msg" required></textarea>
      <input class="btncs" type="submit" onclick="history.go(0);"> 
    </form>
  </div>
</div>

</div>
<script>
  var auto_refresh = setInterval(function(){$('#8888').load('refresh.php');}, 1000);
</script>
</body>
</html> 
