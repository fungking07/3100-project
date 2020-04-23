<?php
    define('MYSQL_ASSOC',MYSQLI_ASSOC);
    include("../ConnectDatabase.php");
    include("../navbar.php");
    $uid = $_SESSION["user_id"];
    $sql = "SELECT * FROM forum WHERE author_id= $uid";
    $result = mysqli_query($connect, $sql);

    $postinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>Forum skeleton</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container-fluid">
        <!--Posts -->
        <div class="col-sm-9">
      <?php include("FetchPost.php") ?>
    </div>
  </div>
</body>