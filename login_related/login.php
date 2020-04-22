<?php
  //use helper function to connect to the database
  include("../ConnectDatabase.php");
  $errors = array();
  function login_check(){
    global $connect;
    global $errors;
    // get the input
    $username = $_POST["user"]; //input id = user
    $password = $_POST["pw"];

    //if username and password is null
    if (empty($username)) {
    	array_push($errors, "Username is required");
    }
    if (empty($password)) {
    	array_push($errors, "Password is required");
    }


    //prevent MySQL injection
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($connect,$username);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($connect,$password);

    //write query
    $password = substr(md5($password),0,15);
    $sql = "SELECT username,password,user_id FROM user
    WHERE username = '$username' AND password = '$password'";

    //get result according to the query in database
    $result = mysqli_query($connect,$sql);

    //fetch the result from query into the asociative array format
    $userdata = mysqli_fetch_assoc($result);

    if($userdata != false){
      if($userdata['username'] == $username && $userdata['password'] == $password){
          $_SESSION["signed_in"] = true;
            $_SESSION["username"] = $userdata["username"];
            $_SESSION["user_id"] = $userdata["user_id"];
          mysqli_free_result($result);
          mysqli_close($connect);
          header("location:../forum_related/forum.php");
    }
  }
  else{
    mysqli_free_result($result);
    mysqli_close($connect);
    array_push($errors, "username/password is incorrect");
  }
}

  if(isset($_POST["register"])){
    header("location:register.php");
  }
  if(isset($_POST["submit"])){
      login_check();
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
      <form  method="Post" action = "login.php">
        <label for="fname">Username:</label>
        <input type="text" id="user" name="user"><br><br>
        <label for="lname">Password:</label>
        <input type="text" id="pw" name="pw"><br><br>
        <button type="submit" class="btn2" onclick="regPage()" name= "submit" value ="submit">CONFIRM</button>
        <a href="verification.php" class="btn2">Forget</a></button>
      </form>
      <div class="red-text"><?php include("error.php")?></div>
    </div>

  </div>

  <div class="split right">
    <div class="centered">
      <p>Not yet our member?</p>
      <h3>REGISTER HERE!</h3>
      <form action="register.php" method="Post">
      <button type="submit" class="btn1" onclick="regPage()" name= "register" value = "register">REGISTER</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
