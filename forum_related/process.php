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

  $commentsql = "SELECT * FROM comment ORDER BY comment_id DESC";
  $commentResult = mysqli_query($conn,$commentsql);

  $cmt=$_GET['cmt'];
  $name = $_SESSION['username'];
  $time = date("Y-m-d H:i:s");
  $postid = $_SESSION['postid'];
  
  if(!$commentResult){
    $cmtid = 1;
  }
  else{
    $Commentinfo = mysqli_fetch_array($commentResult);
    $cmtid = $Commentinfo['comment_id']+1;
  }

  $commentsql = "INSERT INTO comment (comment_id, comment_date_time, post_id, comments_content, author_name)
                  VALUES ('$cmtid','$time','$postid','$cmt','$name')";

  if (mysqli_multi_query($conn, $commentsql)) {
    echo "New records created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>