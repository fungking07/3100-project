<!--
abandoned page
 -->
<?php
  include('ConnectDatabase.php');
  $errors = array();
  if(isset($_POST["submit"])){
    header("location:forum.php");
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
				margin-left:35%;
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
				margin-left:45%;
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
			what do you want to do
		</div>
    <form action = "askinguser.php" method="Post">
		    <a href="myprofile.php"><button class="submit" >Go to my profile</button>
        <div class="red_text"><?php include('error.php'); ?></div>
		    <input class="submit" name = "submit" type="submit" value="Forum"/>
    </form>
	</body>
</html>
