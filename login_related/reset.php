<?php
  include('ConnectDatabase.php');
  $errors = array();
  if(isset($_SESSION["user_id"])){
    $id = mysqli_real_escape_string($connect,$_SESSION["user_id"]);
  }
  function changepw(){
    global $connect;
    global $errors;
    global $id;
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
      $sql = "UPDATE user SET password = '$newpw' where user_id = '$id'";
      //check if data save to database sucessfully
      if(mysqli_query($connect,$sql)){
        header("login.php");
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
		<style type="text/css">
			*{
				margin:0;
				padding:0;
			}
			html{
				background:url(reset_bac.jpeg) no-repeat center center fixed;
				background-size: cover;
			}
			.Reset-Password{
				margin-top:150px;
				margin-left:45%;
				font-size: 50px;
				font-family: 'Cooper Black';
				color:#8b7765;
			}
			#new{
				margin-left:25%;
				margin-top:80px;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 20px;
				border-radius: 20px;
				border-color: gray;
				padding-left: 1%;
				outline: none;
			}
			#confirm{
				display:inline-block;
				margin-left:25%;
				margin-top:50px;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 20px;
				border-radius: 20px;
				border-color: gray;
				padding-left: 1%;
				outline: none;
			}
      .red_text{
        margin-left:44%;
        margin-top:65px;
        color: red;
      }
			.submit{
				margin-left:44%;
				margin-top:65px;
				width: 10%;
				height:35px;
				border-radius: 20px;
				text-align: center;
				border-style: none;
				background-color: #4876ff;
				font-size: 16px;
			}

		</style>
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
