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
  $uid = $_SESSION['user_id'];
  $pid = $_SESSION['postid'];
  $status = 0;
  $sql = "SELECT liked FROM post_like WHERE user_id = $uid";
  $result = mysqli_query($conn, $sql);
  $info = mysqli_fetch_array($result);
  if($info["liked"] == 1){
    echo "<script>
    alert('You have liked this post. Thank you!');
    history.go(-1);
    </script>";
    //header("Location: {$_SERVER["HTTP_REFERER"]}");
  }

  $likesql = "INSERT INTO post_like(user_id, liked, post_id) VALUES ($uid, 1, $pid)";
  $addsql1 = "UPDATE post_content set like_number = like_number + 1 where post_id = $pid";
  $addsql2 = "UPDATE forum set like_number = like_number + 1 where post_id = $pid";

  if (mysqli_multi_query($conn, $likesql) and mysqli_multi_query($conn, $addsql1) and mysqli_multi_query($conn, $addsql2)) {
    //echo "New records created successfully";
  } else {
    //echo "Error: sql error <br>" . mysqli_error($conn);
  }

  echo "<script> history.go(-1); </script>";
  //header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
