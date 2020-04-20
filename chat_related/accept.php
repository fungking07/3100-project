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
  $sql = "SELECT * FROM chatroom WHERE chatroom_id=$crmid ";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);
  if($info['hv_consult']==1){
    //pop up msg
    echo "<script>alert('You have already open the consultation chatroom(in green color), please check it out in your list of chatroom.'); history.go(-1);</script>";
  }
  else{ 
    //u needa check whether you are the one who send the request
    $sql = "SELECT * FROM chat WHERE chatroom_id=$crmid AND msg_type='request' ORDER BY message_date_time DESC";
    $Result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_array($Result);
    if ($info['sender_name']=='Admin1'){//$_SESSION['signed_in']){
      echo "<script>alert('You need to wait confirmation from the other side.'); history.go(-1);</script>";
    }
    else{
      //insert msg to the block
      if($_SESSION['signed_in']){
        $name = $_SESSION['user_name'];
      }
      else{
        $name = "Admin1"; //delete this
        //error die("Cannot identity user account");
      }
      $time = date("Y-m-d H:i:s");
      $conrm = 0;
      
      $commentsql = "INSERT INTO chat (chatroom_id, message, message_date_time, sender_name, consultroom, msg_type)
                      VALUES ('$crmid','','$time','$name','0','accept')";
    
      if (mysqli_multi_query($conn, $commentsql)) {
        echo "New records created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      //update the existing chatroom['hv_consult']=1
      $sql = "UPDATE chatroom SET hv_consult='1' WHERE chatroom_id=$crmid";

      if (mysqli_multi_query($conn, $sql)) {
        echo "update successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      //insert new chatroom to the list
      $commentsql = "INSERT INTO chatroom ( user_id, opponent_id, opponent_picture, consultroom, hv_consult)
                      VALUES ('1','2','NULL','1','1')"; //hard code user_id be 1 and 2 needa use session la

      if (mysqli_multi_query($conn, $commentsql)) {
        echo "New records to chatroom created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
  }
?>