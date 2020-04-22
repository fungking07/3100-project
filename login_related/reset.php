<?php
  include('ConnectDatabase.php');
  $errors = array();
  if(isset($_SESSION["email"])){
    $email = mysqli_real_escape_string($connect,$_SESSION["email"]);
  }
  function changepw(){
    global $connect;
    global $errors;
    global $email;
    $newpw = $_POST["newpw"];
    $confimpw = $_POST["confirmpw"];

    //prevent sql injection
    $newpw = stripslashes($newpw);
    $newpw = mysqli_real_escape_string($connect,$newpw);
    $confimpw = stripslashes($confimpw);
    $confimpw = mysqli_real_escape_string($connect,$confimpw);
    if (empty($newpw)) { array_push($errors, "password is required"); }
  	if (empty($confimpw)) { array_push($errors, "Confirm password needed"); }
    if($newpw == $confimpw){
      //save data to database
      //sql for inset data to database
      $password = substr(md5($newpw),0,15);
      $sql = "UPDATE user SET password = '$password' where email_address = '$email'";
      //check if data save to database sucessfully
      if(mysqli_query($connect,$sql)){
        header("location:login.php");
      }
      else{
        //prompt error
        push($errors,'query error:' . mysqli_error($connect));
        }
    }
    else{
      //promt errors
      mysql_free_resul($result);
      mysqli_close($connect);
      push($errors,"fail to change password . Please try it again.");
    }
  }

  if(isset($_POST["submit"])){
    changepw();
  }
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/reset.css">
	</head>
	<body>
		<div class="Reset-Password">
			Reset
		</div>
    <form action = "reset.php" method="Post">
		    <input type="text" name="newpw" id="new" placeholder="New Password" />
		    <input type="text" name="confirmpw" id="confirm" placeholder="Confirm Password" />
        <div class="red_text"><?php include('error.php'); ?></div>
		    <input class="submit" name = "submit" type="submit" value="submit"/>
    </form>
	</body>
</html>
