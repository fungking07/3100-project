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


  //u needa check whether you are the one who start the consultation
  $sql = "SELECT * FROM chatroom WHERE chatroom_id=$crmid";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);
  echo $info['user_id'];
  if ($info['user_id']!=$_SESSION['user_id']){
    echo "<script>
    alert('You are not allow to end the consult. You can request your consultee to end.');
    history.go(-1);
    </script>";
  }
  else{
    //get the chatroom_id from consultroom
    $sql = "SELECT * FROM chatroom WHERE chatroom_id=$crmid";
    $Result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_array($Result);
    $pcrmid = $info['consultroom'];
    echo  '$pcrmid  $crmid \n';

    //update the existing chatroom['hv_consult']=0
    $sql = "UPDATE chatroom SET hv_consult='0' WHERE chatroom_id=$pcrmid";
    if (mysqli_multi_query($conn, $sql)) {
      echo "update successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //delete chatroom
    $sql = "DELETE FROM chatroom WHERE chatroom_id=$crmid";
    if (mysqli_multi_query($conn, $sql)) {
      echo "delete successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //delete chat msg
    $sql = "DELETE FROM chat WHERE chatroom_id=$crmid";
    if (mysqli_multi_query($conn, $sql)) {
      echo "delete successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //delete request and accept msg
    $sql = "DELETE FROM chat WHERE chatroom_id=$pcrmid AND (msg_type='accept' OR msg_type='request')";
    if (mysqli_multi_query($conn, $sql)) {
      echo "delete successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo "<script>
    alert('The consult chatroom is close and the transaction will be pass to the consulter.');
    </script>";
    header("Location: chat_messages.php"); //actually shd return to chatroom list la as the consultroom is closed
  }

?>