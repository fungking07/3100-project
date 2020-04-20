<?php
  // //as admin from now (change in later code)
	// include(ConnectDatabase.php);

  // $sql = 'SELECT message,message_date_time FROM chat Order By last_message_time';

	// //get result accoriding to the query
	// $result = mysqli_query($connect,$sql);


	// //fetch the result into the aoociative array format
	// $msginfo = mysqli_fetch_all($result,MySQLI_ASSOC);

  // //print message on screen using html below(added)

  // if(isset($_POST["submit"])){
  //   //save the $_POST["msg"] to database
  // }

 ?>
<!DOCTYPE html>
<html>
<head>
<meta HTTP-EQUIV="refresh" CONTENT="100000">
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


<?php

  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, 'AcadMap');

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $crmid = '1'; //parse from url?
  $sql = "SELECT * FROM chat WHERE chatroom_id=$crmid ORDER BY message_date_time";
  $Result = mysqli_query($conn,$sql);

  $col = mysqli_num_rows($Result);
  $myname = 'Admin1'; //$_SESSION['user_name']
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
        echo "<div class=\"container1 darker\">
        <img src=\"../assets/avatar.png\" alt=\"Avatar\" class=\"right\">
        <div class=\"containerdoc\">
          <p>ACCEPTED, new chatroom is created in the chatlist.</p>
          <button class=\"btnsend\">chatroom</button>
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

<div class="chat" id="myForm">

  <form action="consult.php" class="form-container">
      <input class="btn" style="margin-top:25px" type="submit" onclick="history.go(0);" value='Consult'>
  </form>

  <form action="chatp.php" class="form-container">
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <input class="btn" type="submit" onclick="history.go(0);"> 
  </form>

</div>
</div>


</body>
</html> 
