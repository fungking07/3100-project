<?php
  //use helper function to connect to the database
  function login(){
    include(ConnectDatabase.php);

    // get the input
    $username = $_POST["user"]; //input id = user
    $password = $_POST["pw"];

    //prevent MySQL injection
    $username = stripslashes($username);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($password);
    $password = mysql_real_escape_string($password);

    //write query
    $sql = "SELECT username,password, user_id FROM user
    WHERE username = $username and password = $password";

    //get result according to the query in database
    $result = mysqli_query($connect,$sql);

    //fetch the result from query into the asociative array format
    $userdata = mysqli_fetch_all($result,MySQLI_ASSOC);
    if ($userdata['username'] == $username && $userdata['password'] == $password){

        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $userdata["user_id"];

      //free all
      mysql_free_resul($result);
      mysqli_close($connect);
      header("forum.php");
    }
    else{
      mysql_free_resul($result);
      mysqli_close($connect);
      echo "Login fail. Please try it again.";
    }
  }
  if(isset($_GET["forget"])){
    header("verification.php");
  }
  if(isset($_GET["register"])){
    header("register.php");
  }
  if(isset($_GET["submit"])){
      login();
  }
  /*
   as we need to use database,
   we copy login.html to php in order to make action in html functional
  */
 ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>Forum skeleton</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/login.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
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
<body>
<div class="content">
  <div class="split left">
    <div class="centered">
      <form action="login.php" method="get">
        <label for="fname">Username:</label>
        <input type="text" id="user" name="user"><br><br>
        <label for="lname">Password:</label>
        <input type="text" id="pw" name="pw"><br><br>
        <button type="submit" class="btn2" onclick="regPage()" name= "submit" value = "submit">CONFIRM</button>
        <button type="button" class="btn2" onclick="regPage()" name="forget" value = "forget">FORGET</button>
      </form>
    </div>
  </div>

  <div class="split right">
    <div class="centered">
      <p>Not yet our member?</p>
      <h3>REGISTER HERE!</h3>
      <button type="button" class="btn1" onclick="regPage()"name="register" value = "register">REGISTER</button>
    </div>
  </div>
</div>

</body>
</html>
