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
  $crmid = $_SESSION["crmid"]; 
  $sql = "SELECT * FROM chatroom WHERE chatroom_id=$crmid ";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);
  if($info['hv_consult']==1){
    //pop up msg
    echo "<script>alert('You have already open the consultation chatroom(in green color), please check it out in your list of chatroom.'); history.go(-1);</script>";
  }
  else{
    //insert msg to the block
    $sql = "SELECT * FROM chat WHERE chatroom_id=$crmid";
    $Result = mysqli_query($conn,$sql);
  
    $name = $_SESSION['username'];

    $time = date("Y-m-d H:i:s");
    $conrm = 0;
    
    $commentsql = "INSERT INTO chat (chatroom_id, message, message_date_time, sender_name, consultroom, msg_type)
                    VALUES ('$crmid','','$time','$name','0','request')";
  
    if (mysqli_multi_query($conn, $commentsql)) {
      echo "New records created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo "<script>
    alert('$200 is charged from your account for the consultation when the consulter accept the request.');
    </script>";
    header("Location: {$_SERVER["HTTP_REFERER"]}#bottom");
  }
?>