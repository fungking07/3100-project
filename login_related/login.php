<!--
PROGRAM login.php - forum
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- forum.php
- navbar.php -> login.php
where nav bar is for navigation between page
Where login button is for logging in with checking
Where register button is for rediecting to register page
where forget buttuon is for Redirecting to verification page
VERSION 1: written 2-2-2020
REVISION 1.1: 3-3-2020 to improve searching algorithm.
PURPOSE:
DATA STRUCTURES:
ALGORITHM:
 -->

<?php
  //use helper function to connect to the database
  include("../ConnectDatabase.php");
  //add navbar to page
  include("../navbar.php");

  //If user signedin then prompt a alert message to user telling them they have signed in
  if(isset($_SESSION['signed_in']) == true){
    echo "<script>
    alert('You have been logged in. Redirecting you to our forum.');
    window.location.href='../forum_related/forum.php';
    </script>";
  }
  //To store all error message
  $errors = array();
  //check user infomation is correct or not
  function login_check(){
    //get the GLOBALS variable
    global $connect;
    global $errors;
    // get the input pw and name from user
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

    //if the user exist then the userdata will be true
    if($userdata != false){
      if($userdata['username'] == $username && $userdata['password'] == $password){
         //set session variables
          $_SESSION["signed_in"] = true;
            $_SESSION["username"] = $userdata["username"];
            $_SESSION["user_id"] = $userdata["user_id"];
          //free result
          mysqli_free_result($result);
          //close connection
          mysqli_close($connect);
          //rediect user to forum as signed in
          header("location:../forum_related/forum.php");
    }
  }
  else{
    //free result
    mysqli_free_result($result);
    //close connection
    mysqli_close($connect);
    //push error message to array and promt to the user in html code
    array_push($errors, "username/password is incorrect");
  }
}
  // if user press register button rediect user to register page
  if(isset($_POST["register"])){
    header("location:register.php");
  }
  //if user press the submite button then go to login check function to check user info is correct or not
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
<style>
.left {
  left: 0;
background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);

}

.right {
  right: 0;
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
}
.button1{
	background: transparent;
	color: #6B5B95;
	border: 5px solid #6B5B95;
	border-radius: 50px;
	padding: 0.8rem 2rem;
	font: 18px "Margarine", sans-serif;
	outline: none;
	cursor: pointer;
	position: relative;
	transition: 0.2s ease-in-out;
	letter-spacing: 2px;
}
.button1:hover {background-color: #66CCCC}
.button1:active {
  background-color: #66CCCC;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.input{
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid #696969;
}
.colorful{
  font-size: 30px;
  font-family: "Courier New", Courier, monospace;
  color: #6B5B95;
}
</style>
</head>
<body>
<div class="content">
  <div class="split left">
    <div class="centered">
        <div class="colorful">
          <h1>AcadMap</h>
        </div>
      <form  method="Post" action = "login.php">
        <input type="text" id="user" name="user" class ="input" placeholder="Type username"><br><br>
        <input type="password" id="pw" name="pw" class ="input" placeholder="Type password"><br><br>
        <button type="submit" class="button1" name= "submit" value ="submit">CONFIRM</button>
        <a href="verification.php" class="button1">FORGET</a>
      </form>
      <div class="red-text"><?php include("error.php")?></div>
    </div>

  </div>

  <div class="split right">
    <div class="centered">
      <div class="colorful">
      <p >Not yet our member?</p>
      <h3>REGISTER HERE!</h3>
      </div>
      <form action="register.php" method="Post">
      <button type="submit" class="button1" onclick="regPage()" name= "register" value = "register">REGISTER</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
