<!-- 
PROGRAM end.php - update consulter profile for the comment of consultation
                - remove the consultation request and accepted message and consultroom link from the normal chatroom
                - delete the current consultation chatroom
PROGRAMMER: Chung Tsz Ting 115511028
CALLING SEQUENCE: 
- 'end' button in cschatrooms.php -> end.php -> chatrooms.php
WHERE 'end' button cschatrooms.php
 -->
<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $score = $_GET['score'];
  $oppoid = $_SESSION['oppoid'];
  $comment = $_GET['comment'];

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
    echo  '$pcrmid $crmid \n';

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
    $comment_date = date("Y-m-d H:i:s");

    //insert consultation_comment
    $uid = $_SESSION['user_id'];
    $sql = "INSERT INTO consultation_comment (user_id, author_id, score, comments, comment_date) VALUES
    ('$oppoid','$uid','$score','$comment','$comment_date')";
    if (mysqli_multi_query($conn, $sql)) {
      echo "insert successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //GET AVG(SCORE) from consultation_comment
    $sql = "SELECT AVG(score) AS Ascore FROM consultation_comment WHERE user_id=$oppoid";
    $Result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_array($Result);
    $score = $info['Ascore'];
    echo $score;

    //update consult_rating
    $sql = "UPDATE user_profile SET consult_rating='$score' WHERE user_id=$oppoid";
    if (mysqli_multi_query($conn, $sql)) {
      echo "update successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    echo "<script>
    alert('The consult chatroom is close and the transaction will be pass to the consulter.');
    </script>";
    header("Location: chat_messages.php"); 
  }

?>