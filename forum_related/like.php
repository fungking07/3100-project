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
  $uid = $_SESSION['user_id'];
  $pid = $_SESSION['postid'];
  $likesql = "INSERT INTO post_like(user_id, liked, post_id) VALUES ($uid, 1, $pid)";
  $addsql1 = "UPDATE post_content set like_number = like_number + 1 where post_id = $pid";
  $addsql2 = "UPDATE forum set like_number = like_number + 1 where post_id = $pid";

  if (mysqli_multi_query($conn, $likesql) and mysqli_multi_query($conn, $addsql1) and mysqli_multi_query($conn, $addsql2)) {
    echo "New records created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
   
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>