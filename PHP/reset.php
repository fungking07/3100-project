<?php
include("ConnectDatabase.php");
//need SDO_DAS_ChangeSummary
if(isset($_POST["submitemail"])){
	//tell server to send verification code

	//echo a message to tell user to wait for the verification code and enter it
}

if(isset($_POST["submitVerification"])){
	//if verification code match and passsword is ok

	//output a suceesful reset message on screen
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			.Reset-Password{
				position:absolute;
				top:50px;
				left:650px;
				font-size: 50px;
			}
			.main{
				position:absolute;
				left:250px;
				top:130px;
				width:1100px;
				height:800px;
			}
			.email{
				position:absolute;
				left:0;
				top:30px;
				width:700px;
				height:80px;
			}
			.inner-1{
				position:absolute;
				top:20px;
				font-size: 30px;
			}
			.inner-2{
				position: absolute;
				width:900px;
				height:27px;
				left:130px;
				top:21px;
				font-size: 25px;
			}
			.verification{
				position:absolute;
				left:0;
				top:90px;
				width:700px;
				height:80px;
			}
			.inner-verification{
				position: absolute;
				width:760px;
				height:27px;
				left:270px;
				top:21px;
				font-size: 25px;
			}
			.new-password{
				position:absolute;
				left:0;
				top:150px;
				width:700px;
				height:80px;
			}
			.confirm-password{
				position:absolute;
				left:0;
				top:210px;
				width:700px;
				height:80px;
			}
			.submit{
				position:absolute;
				left:500px;
				top:310px;
				width:100px;
				height:34px;
				font-size: 25px;
			}
		</style>
	</head>
	<body>
		<div class="Reset-Password">
			Reset Password
		</div>
		<form action="sucessfulReset.html" class="main" method="Post">
			<div class="email">
				<div class="inner-1">
					Email:
				</div>
				<input class="inner-2" type="text" name="email" />
			</div>
			<div class="verification">
				<div class="inner-1">
					Verification Code:
				</div>
				<input class="inner-verification" type="text" name="Verification" />
			</div>
			<div class="new-password">
				<div class="inner-1">
					New Password:
				</div>
				<input class="inner-verification" type="text" name="new-password" />
			</div>
			<div class="confirm-password">
				<div class="inner-1">
					Confirm Password:
				</div>
				<input class="inner-verification" type="text" name="confirm-password" />
			</div>
			<input class="submit" type="submit" value="submitemail" name="submitemail"/>
			<input class="submit" type="submit" value="submitVerification" name="submitVerification"/>
		</form>

	</body>
</html>
