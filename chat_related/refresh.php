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
        <p>ACCEPTED, new chatroom is created in the chatlist.<br>
        Payment is received from the consultee.</p>
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
        $ccidsql = "SELECT * FROM chatroom WHERE consultroom=$crmid";
        $ccidResult = mysqli_query($conn,$ccidsql);
        $ccidinfo = mysqli_fetch_array($ccidResult);
        $ccid = $ccidinfo['chatroom_id'];
        echo "<div class=\"container1\">
        <img src=\"../assets/avatar.png\" alt=\"Avatar\">
        <div class=\"containerdoc\">
        <p>ACCEPTED, new chatroom is created in the chatlist.<br>
        Payment is received from the consultee.</p>
        <button class=\"btnsend\" onclick=\"window.location.href='cschatrooms.php?id=$ccid'\">chatroom</button>
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
