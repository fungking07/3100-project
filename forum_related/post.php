<!-- 
PROGRAM myprofile - allow user view the content of the post in forum
                  - allow user to write comment to the post
                  - allow user to like the post
PROGRAMMER: Chung Tsz Ting 115511028
CALLING SEQUENCE: 
-'read' button in forum.php | in post history in navigation bar -> post.php -> like.php -> post.php
-'read' button in forum.php | in post history in navigation bar -> 'submit' button in post.php -> post.php 
WHERE 'read' button in forum.php | in post history in navigation bar
 -->
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="device-width, initial-scale = 1">
  <title>Forum skeleton</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/post.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</head>
<body>

<div class="content1">

<?php
  session_start();
  include("../navbar.php");
  $servername = "localhost";
  $username = "root";
  $password = "";
  $postid=$_GET['post_id'];
  $_SESSION['postid']=$postid;

  // Create connection
  $conn = new mysqli($servername, $username, $password, 'AcadMap');

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM post_content WHERE post_id=$postid";
  $Result = mysqli_query($conn,$sql);
  $info = mysqli_fetch_array($Result);

  $fsql = "SELECT * FROM forum WHERE post_id=$postid";
  $fResult = mysqli_query($conn,$fsql);
  $finfo = mysqli_fetch_array($fResult);
  $aid = $finfo['author_id'];
  echo "<div class='container1' style='margin-top:50px'>
  <img class='left' src='../assets/avatar.png' alt='Avatar1' height='30' width='30'>
  <p class='name'><a href='othersprofile.php?uid=$aid'>".$finfo['author_name']."</a></p>
  <p style='color:grey; font-size:22px'>".$finfo['post_title']."<p>
  <p>".$info['post_content']."</p>
  <span class='time-right'>".$finfo['post_date']."</span>
  </div>";

  $commentsql = "SELECT * FROM comment WHERE post_id=$postid";
  $commentResult = mysqli_query($conn,$commentsql);

  $col = mysqli_num_rows($commentResult);

  
  for ($x = 0; $x < $col; $x++) {
    $Commentinfo = mysqli_fetch_array($commentResult);
    $aname = $Commentinfo['author_name'];

      $username = $Commentinfo['author_name'];
      $sql = "SELECT * FROM user WHERE username='$username'";
      $Result = mysqli_query($conn,$sql);
      $info = mysqli_fetch_array($Result);
      $aid = $info['user_id'];
      echo "<div class=\"container1 reply\">
            <img class=\"left\" src=\"../assets/avatar.png\" alt=\"Avatar1\" height=\"30\" width=\"30\">
            <p class=\"name\"> <a href='othersprofile.php?uid=$aid'>".$Commentinfo['author_name']."</a></p>
            <p>".$Commentinfo['comments_content']."</p>
            <span class=\"time-right\">".$Commentinfo['comment_date_time']."</span>
            </div>";
    
  }
?>

<?php
  if(isset($_SESSION["signed_in"])){
    if($_SESSION["signed_in"]==true){
      echo '<form action="process.php" class="form-container" method="get">
      Comment:<br>
        <textarea type="text" placeholder="Type comment.." name="cmt"></textarea>
        <input class="btn2" type="submit" onclick="history.go(0);">
        <input class="btn btn-primary" type="button" value="Like" onclick="location.href = '."'like.php'".'">
      </form>';
    }
  }
?>


</div>

</body>
</html>
