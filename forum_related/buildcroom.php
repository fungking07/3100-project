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
  
  $uid = $_SESSION["user_id"];
  $oppoid = $_SESSION["oppoid"];
  $sql = "SELECT * FROM chatroom WHERE (user_id=$uid OR user_id=$oppoid) AND (opponent_id=$uid OR opponent_id=$oppoid)";
  $Result = mysqli_query($conn,$sql);
  if($oppoid == $uid){
	echo "<script>alert('You cannot consult yourself XD.'); history.go(-1);</script>";
  }
  else if(mysqli_num_rows($Result)>0){
  echo "<script>alert('You have already open the chatroom(in purple color)'); ";
  header("Location: ../chat_related/chat_messages.php");
  }
  else{
      //get the max value of chatroom_id
      $sql = "SELECT MAX(chatroom_id) AS max_id FROM chatroom";
      $Result = mysqli_query($conn,$sql);
      $info = mysqli_fetch_array($Result);
      $max = $info['max_id'] + 1;
      $time = date("Y-m-d H:i:s");
      $myid = $_SESSION['user_id'];

      //insert new chatroom to the list
      $commentsql = "INSERT INTO chatroom (chatroom_id, user_id, opponent_id, last_message_time, opponent_picture, consultroom, hv_consult)
                      VALUES ('$max','$oppoid','$myid','$time','NULL','0','0')"; //hard code user_id be 1 and 2 needa use session la RMB THAT USER_ID shd be ppl request

      $_SESSION['ccid']=$max;

      if (mysqli_multi_query($conn, $commentsql)) {
        echo "New records to chatroom created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	  }
    header("Location: ../chat_related/chat_messages.php");
    echo "<script>alert('Chatroom is built.');</script>";
  }
?>