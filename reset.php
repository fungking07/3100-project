<?php
  include(ConnectDatabase.php);
  $newpw = $_POST["newpw"];
  $confimpw = $_POST["confimpw"];

  //prevent sql injection
  $newpw = stripslashes($newpw);
  $newpw = mysqli_real_escape_string($connect,$newpw);
  $confimpw = stripslashes($confimpw);
  $confimpw = mysqli_real_escape_string($connect,$confimpw);

  if(isset($_POST["submit"])){
    if($newpw == $confimpw){
      //save data to database
      //sql for inset data to database
      $sql = "UPDATE user SET password = $newpw";
      //check if data save to database sucessfully
      if(mysqli_query($connect,$sql)){
        header("login.php");
      }
      else{
        //prompt error
        echo 'query error:' . mysqli_error($connect);
        }
    }
    else{
      //promt errors
      mysql_free_resul($result);
      mysqli_close($connect);
      echo "Login fail. Please try it again.";
    }
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
    <form class="main" method="Post">
		    <input type="text" name="newpw" id="new" placeholder="New Password" />
		    <input type="text" name="confirmpw" id="confirm" placeholder="Confirm Password" />
		    <input class="submit" type="submit" value="submit"/>
    </form>
	</body>
</html>
