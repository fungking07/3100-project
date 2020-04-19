<?php
  //$sql = 'SELECT * FROM post Order BY post_id';
  //$result = mysqli_query($connect,$sql);

  /*
  $comment_sql = 'SELECT * FROM comment
  WHERE post.post_id = comment.post_id
  ORDER BY comment.comment_id'
  //end of sql
  //output $post_comment_sql
  */


  //$Postinfo = mysqli_fetch_all($result,MySQLI_ASSOC);
  //$Commentinfo = mysqli_fetch_all($commentResult,MySQLI_ASSOC);
  //mysql_free_resul($result);

  //if(isset($_GET["submit"])){
    //direct user to another page to write comment
    //header("comment.php");
  //}
  //output the post_title and post_content in the html below(done partially)


  //output the post_title and post_content in the html below(not done)
  /*code skeleton of poutputinf Comment*/

  //php way
  //<?php forreach($commentinfo as comment){
  //  if(post_id = current_post_id){
  //
?>

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

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="#" class="navbar-brand">AcadMap</a>
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="#">Forum</a></li>
        <li><a href="#">Chat</a></li>
        <li><a href="#">Consultation</a></li>
        <input type="text" placeholder="Search..">
        <li><a href="#">Welcome, User!</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="content1">

<div class="container1">
  <img class="left" src="../assets/avatar.png" alt="Avatar1" height="30" width="30">
  <p class="name">Avatar 1</p>
  <span class="time-right">time1</span>
  <p>ar idk how to get the forum id... from the url?</p>
</div>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, 'test');

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $commentsql = "SELECT * FROM comment";
  $commentResult = mysqli_query($conn,$commentsql);

  $col = mysqli_num_rows($commentResult);

  for ($x = 0; $x < $col; $x++) {
    $Commentinfo = mysqli_fetch_array($commentResult);
    echo "<div class=\"container1 reply\">
          <img class=\"left\" src=\"../assets/avatar.png\" alt=\"Avatar1\" height=\"30\" width=\"30\">
          <p class=\"name\">".$Commentinfo['author_name']."</p>
          <p>".$Commentinfo['comments_content']."</p>
          <span class=\"time-right\">".$Commentinfo['comment_date_time']."</span>
          </div>";
  }
?>

<form action="process.php" class="form-container" method="get">
Comment:<br>
  <textarea type="text" placeholder="Type comment.." name="cmt"></textarea>
  <input class="btn2" type="submit" onclick="history.go(0);">
</form>

</div>

</body>
</html>
