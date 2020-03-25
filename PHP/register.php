<?php
	$error =[UserID=>"",username=>"",password=>"",email=>""];
	if(isset($_POST[submit])){
		//validate every data
	if(/*UserID is valid*/){
			//save data to database
		}
		else{
			//keep userdata in the form
			//promt error to user
			//remain on this page
		}
	if(/*Username is valid*/){
			//save data to database
		}
		else{
			//keep userdata in the form
			//promt error to user
			//remain on this page
		}
	if(/*password is valid*/){
			//save data to database
			//remain on this page
		}
		else{
			//keep userdata in the form
			//promt error to user
			//remain on this page
		}
	if(/*email is valid*/){
		//keep userdata in the form
			//save data to database
			//remain on this page
		}
		else{
			//keep userdata in the form
			//promt error to user
			//remain on this page
		}
		header("registersucessful.html");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			.register{
				position:absolute;
				top:50px;
				left:700px;
				font-size: 50px;
			}
			.picture{
				position:absolute;
				left:250px;
				top:130px;
				width:700px;
				height:80px;
			}
			.picture-1{
				position:absolute;
				top:20px;
				font-size: 30px;
			}
			.circle{
				position: absolute;
				width:70px;
				height:70px;
				border-radius: 50px;
				border-style: solid;
				border-color: gray;
				left:130px;
			}
			.form{
				position:absolute;
				left:250px;
				top:200px;
				width:1100px;
				height:800px;
			}
			.userID{
				position:absolute;
				left:0;
				top:0;
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
			.username{
				position:absolute;
				left:0;
				top:60px;
				width:700px;
				height:80px;
			}
			.password{
				position:absolute;
				left:0;
				top:120px;
				width:700px;
				height:80px;
			}
			.email{
				position:absolute;
				left:0;
				top:180px;
				width:700px;
				height:80px;
			}
			.major{
				position:absolute;
				left:0;
				top:240px;
				width:700px;
				height:80px;
			}
			.education{
				position:absolute;
				left:0;
				top:300px;
				width:700px;
				height:80px;
			}
			.education-2{
				position: absolute;
				width:500px;
				height:34px;
				left:130px;
				top:16px;
				font-size: 21px;
			}
			.personal-description{
				position:absolute;
				left:0;
				top:360px;
				width:700px;
				height:80px;
			}
			.inner-personal--description{
				position: absolute;
				width:1030px;
				height:200px;
				left:0px;
				top:60px;
				font-size: 25px;
			}
			.submit{
				position:absolute;
				left:500px;
				top:680px;
				width:100px;
				height:34px;
				font-size: 25px;
			}
		</style>
	</head>
	<body>
		<div class="register">
			Register
		</div>
		<div class="picture">
			<div class="picture-1">
				Picture:
			</div>
			<div class="circle">
			</div>
		</div>
			<form action="register.php" class="form" method="post">
				<div class="userID">
					<div class="inner-1">
						UserID:
					</div>
					<input class="inner-2" type="text" name="userID" />
				</div>
				<div class="username">
					<div class="inner-1">
						Username:
					</div>
					<input class="inner-2" type="text" name="username" />
				</div>
				<div class="password">
					<div class="inner-1">
						Password:
					</div>
					<input class="inner-2" type="password" name="password" />
				</div>
				<div class="email">
					<div class="inner-1">
						Email:
					</div>
					<input class="inner-2" type="text" name="email" />
				</div>
				<div class="major">
					<div class="inner-1">
						Major:
					</div>
				<select class="inner-2">
					<option style="display: none;" value =""></option>
					<option value ="Arts">Arts</option>
					<option value ="Business">Business</option>
					<option value ="Education">Education</option>
					<option value ="Engineering">Engineering</option>
					<option value ="Law">Law</option>
					<option value ="Medicine">Medicine</option>
					<option value ="Science">Science</option>
					<option value ="Social Sciennce">Social Science</option>
				</select>
				</div>
				<div class="education">
					<div class="inner-1">
						Education:
					</div>
					<select class="education-2">
						<option style="display: none;" value =""></option>
						<option value ="High Schoool">High Schoool</option>
						<option value ="Undergraduate">Undergraduate</option>
					</select>
				</div>
				<div class="personal-description">
					<div class="inner-1">
						Personal Description:
					</div>
					<br>
					<textarea class="inner-personal--description" rows="10" cols="50"> </textarea> />
				</div>
				<input class="submit" type="submit" name:"submit" value="submit"/>
			</form>

	</body>
</html>
