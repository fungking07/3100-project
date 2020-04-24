<?php
  define('MYSQL_BOTH',MYSQLI_BOTH);
  define('MYSQL_NUM',MYSQLI_NUM);
  define('MYSQL_ASSOC',MYSQLI_ASSOC);
  include("ConnectDatabase.php");
  include("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>Forum skeleton</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</head>

<body>
<div class = "continer container-fluid">
  <div class = "col-lg-12">
    <div class='text-center'>
    <h1>You shall not PASS!</h1><hr />
    </div>
    <img src="/assets/yudodis.png">
    <h3> Don't try to open Pandora's box, otherwise, you will be force to <a href="login_related/login.php">register</a> and paid for our services.</h3>
  </div>
</div>

</body>
