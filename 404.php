<!-- 
PROGRAM 404.php -   
PROGRAMMER: Lam King Fung 1155108968
CALLING SEQUENCE: 
- 404.php (direct access)
- incorrect link -> 404.php
 -->
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
      <font size="72" color="#aa0000">404</font><hr>
    <h1>Oops, You've been to a mystery area.</h1><hr />
    </div>
    <h3>The page that you requested does not exist, sorry. Try the functions listed above first.
        Unless you randomly search for our 404 page, then you have found the right place.</h3>

  <?php
  if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
    $refuri = parse_url($_SERVER['HTTP_REFERER']); // use the parse_url() function to create an array containing information about the domain
    if($refuri['host'] == "localhost"){
    //the link was on your site
    echo "<h3>Please send us an email for a dead link. Try the functions listed above and we owe you a drink.</h3>";
    }
  }
  else{
  //the visitor typed gibberish into the address bar
  echo "<h3>If you got here from wherever you are, step away from us and listen to Michael's jokes first. <br>And if you insist to do that, stop typing. You're filling my error logs with unnecessary junk.</h3>";
  }
  ?>
  <center>
  <h3>Here's a random priase to Michael. Enjoy!</h3>
    <img src="/assets/404ee.jpg" />
    <p>
      Courtesy of our classmates <a href="https://piazza.com/class/k49r1y3uxe8u2?cid=176">here</a>.
    </p>
  </center>

  </div>
</div>

</body>
