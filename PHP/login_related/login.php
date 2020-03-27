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
    $sql = "SELECT username,password FROM user
    WHERE username = '$username' and password = '$password'";
    //get result according to the query in database
    $result = mysqli_query($connect,$sql);
    //fetch the result from query into the asociative array format
    $userdata = mysqli_fetch_all($result,MySQLI_ASSOC);
    if ($userdata['username'] == $username && $userdata['password'] == $password){
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
    header("reset.php");
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  color: black;
}

.header {
  position: fixed;
  top: 0;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  top: 50;
  z-index: 1;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #FFD1BA;
}

.right {
  right: 0;
  background-color: #BABFFF;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
  border-radius: 50%;
}

.content {
  padding: 45px 0;
  margin: 2px auto 2px auto;
  width: 90%;
}

.btn1 {
  background-color: #DE875F;
  color: white;
  padding: 16px 20px;
  margin: 10px 5px 22px 5px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
  text-align:center;
}

.btn2 {
  float: left;
  background-color: #A268B8;
  color: white;
  padding: 16px 20px;
  margin: 10px 5px 22px 5px;
  border: none;
  cursor: pointer;
  width: 45%;
  margin-bottom:10px;
  opacity: 0.8;
  text-align:center;
}

.btn1:hover, .btn2:hover {
  opacity: 1;
}

</style>
</head>
<div class="header">
  <p>AcadMap</p>
</div>
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
