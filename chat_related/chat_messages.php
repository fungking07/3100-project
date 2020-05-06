<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>chats</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat_msg.css">
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/chatrooms.js"></script>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['signed_in']) == false){
  echo "<script>
  window.location.href='/403.php';
  </script>";
}
include("../navbar.php");
?>

<div class="header1">
  <p>---- CHATROOM ---</p>
</div>

<div class="content1">

<?php

  //$_SESSION["user_id"]=1;
  //$_SESSION["username"]='Admin1';

  $myid = $_SESSION["user_id"];
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, 'AcadMap');

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM chatroom WHERE (user_id=$myid OR opponent_id=$myid) ORDER BY last_message_time DESC";
  $Result = mysqli_query($conn,$sql);

  $col = mysqli_num_rows($Result);
  $myname = $_SESSION['username'];
  if($col>0){
    for ($x = 0; $x < $col; $x++) {
      $info = mysqli_fetch_array($Result);

      //find the oppo_id
      if($info['user_id']==$myid){
        $oppoid = $info['opponent_id'];
      }
      else{
        $oppoid = $info['user_id'];
      }

      //find the name of ppl that I have connection to
      $sql2 = "SELECT * FROM user WHERE user_id=$oppoid";
      $Result2 = mysqli_query($conn,$sql2);
      $info2 = mysqli_fetch_array($Result2);
      $rmid = $info['chatroom_id'];
      if($info['consultroom']!=0){
        echo "<div id=$rmid class='cscontainer1' onclick=\"window.location.href='cschatrooms.php?id=$rmid'\">
              <img class='avatarname' src='../assets/avatar.png' alt='Avatar' height='30' width='30'>
              <h4> ".$info2['username']."</h4>
              <span class='time-right'>".$info['last_message_time']."</span>
              </div>";
      }
      else{
        echo "<div id=$rmid class='container1' onclick=\"window.location.href='chatrooms.php?id=$rmid'\">
              <img class='avatarname' src='../assets/avatar.png' alt='Avatar' height='30' width='30'>
              <h4> ".$info2['username']."</h4>
              <span class='time-right'>".$info['last_message_time']."</span>
              </div>";
      }
    }
  }

?>

</div>

</body>
</html>
