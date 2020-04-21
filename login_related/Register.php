<?php
	include("ConnectDatabase.php");
	$errors = array();
	function register(){
		//variable declaration
		global $connect;
		global $errors;


		//get data from user inpuy
		$firstname = $_POST["first"];
		$lastname = $_POST["last"];
		$username = $_POST["user"];
		$email = $_POST["email"];
		$major = $_POST["major"];
		$education = $_POST["education"];
		$pd = "";

		//prevent sql injection
	  $firstname = stripslashes($firstname);
	  $firstname = mysqli_real_escape_string($connect,$firstname);
	  $lastname = stripslashes($lastname);
	  $lastname = mysqli_real_escape_string($connect,$lastname);
		$username= stripslashes($username);
	  $username = mysqli_real_escape_string($connect,$username);
	  $email = stripslashes($email);
	  $email = mysqli_real_escape_string($connect,$email);
		$major= stripslashes($major);
	  $major = mysqli_real_escape_string($connect,$major);
		$pd = stripslashes($pd);
		$pd = mysqli_real_escape_string($connect,$pd);

		$name = $firstname . $lastname;

		if (empty($username)) { array_push($errors, "Username is required"); }
  	if (empty($email)) { array_push($errors, "Email is required"); }
  	//if (empty($password)) { array_push($errors, "Password is required"); }

		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($connect, $user_check_query);
		if($result != False){
			$user = mysqli_fetch_assoc($result);
			if ($user) { // if user exists
			if ($user['username'] == $username) {
				array_push($errors, "Username already exists");
			}
			if ($user['email'] == $email) {
				array_push($errors, "email already exists");
			}
		}
		}



		//
		if (count($errors) == 0) {
		$usersql = "INSERT INTO user(username,email_address) VALUES ('$username','$email')";
		$useridsql = "SELECT  user_id FROM user
		WHERE username = '$username'";
		$idresult = mysqli_query($connect,$useridsql);
		if($idresult != False){
				$userdata = mysqli_fetch_assoc($idresult);
				$userid = $userdata["user_id"];
		}
		if($userid != Null){
			$sql = "INSERT INTO user_profile(user_id,user_name,education_level,personal_description,major) VALUES ('$userid','$username','$education','$pd','$major')";
			if(mysqli_query($connect,$usersql) && mysqli_query($connect,$sql)){
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $userid;
	  		$_SESSION['signed_in'] = True;
	  		header('location: index.php');
			}
			else{
				//prompt error
				echo 'query error:' . mysqli_error($connect);
				}
		}
		else{
			echo "error";		}
		}

}
	if(isset($_POST["submit"])){
		register();
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
				outline:none;
			}
			html{
				background:url(../assets/register_bac.jpeg) no-repeat center center fixed;
				background-size: cover;
			}
			.register{
				margin-left:42%;
				margin-top:3%;
				text-align: center;
				font-size: 40px;
				font-family: 'Cooper Black';
				margin-bottom: 25px;
				color:skyblue;
			}
			.picture{
				display:inline-block;
				width:100px;
				height:100px;
				border-radius: 50px;
				border-color: gray;
				border-style: solid;
				border-width: 2px;
				background-color: white;
				margin-left:45%;
			}
			.upload{
				display:inline-block;
				vertical-align: text-top;
				margin-top:-60px;
				margin-left:3%;
				width: 170px;
				height:35px;
				border-color: gray;
				border-style: solid;
				border-width: 2px;
				font-size: 15px;
			}
			.upload:hover{
				border-style:solid;
				border-width: 2px;
				border-color: skyblue;
			}
			.first{
				margin-left:45%;
			}
			input:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			input:focus{
				border-width: 2px;
				border-color: skyblue;
			}
			.major:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.major:active{
				border-width: 2px;
				border-color: skyblue;
			}
			.education:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.education:active{
				border-width: 2px;
				border-color: skyblue;
			}
			.per-des:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.confirm:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.per-des:active{
				border-width: 2px;
				border-color: skyblue;
			}
			.first,.last,.user{
				display:inline-block;
				margin-top:2%;
				width: 15%;
				height:35px;
				text-align: center;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
			}
			.last,.user{
				margin-left:2%;
			}
			.password{
				margin-left:45%;
				margin-top:2%;
				width: 49%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
				padding-left: 1%;
			}
			.con_password{
				margin-left:45%;
				margin-top:2%;
				width: 38%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
				padding-left: 1%;
			}
			.confirm{
				display:inline-block;
				margin-top:2%;
				margin-left:1%;
				width: 9.6%;
				height:35px;
				border-color: gray;
				border-style: solid;
				border-width: 2px;
				font-size: 15px;
			}
			.email{
				margin-left:45%;
				margin-top:2%;
				width: 49%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
				padding-left: 1%;
			}
			.major{
				margin-left:45%;
				margin-top:2%;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
			}
			select{
				border:none;
				width:100%;
				height:100%;
				appearance: none;
				font-size: 16px;
				padding-left: 1%;
			}
			.education{
				margin-left:45%;
				margin-top:2%;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
			}
			.per-des{
				margin-left:45%;
				margin-top:2%;
				width: 49%;
				height:100px;
				border-style: solid;
				border-color: gray;
				padding-left: 1%;
				text-align: center;
			}
			.inner-persnal-description{
				border:none;
				width:100%;
				height:90%;
				appearance: none;
				font-size: 16px;
				margin-left:-2%;
				padding-left: 1%;
				padding-top: 1%;
			}
			.submit{
				margin-left:65%;
				margin-top:2%;
				width: 10%;
				height:35px;
				text-align: center;
				border-style: none;
				background-color: rgb(115,255,99);
				font-size: 16px;
			}
		</style>

	</head>
	<body style="height:2000px">
		<div class="register">
			Start Your Bright Future
		</div>
		<div class="picture">
		</div>
		<button class="upload" type="button">Upload your portrait</button> <br>
		<input type="text" class="first" name="first" placeholder="First Name" />
		<input type="text" class="last" name="last" placeholder="Last Name" />
		<input type="text" class="user" name="user" placeholder="Username" />
		<input type="password" class="password" name="password" placeholder="password" />
		<input type="password" class="con_password" name="con_password" placeholder="confirm password"/>
		<button class="confirm" type="button">confirm</button>
		<input type="text" class="email" placeholder="Email Address" />
		<div class="major">
			<select  >
				<option style="display: none;" value ="">major</option>
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
			<select >
				<option style="display: none;" value ="">Education</option>
				<option value ="High Schoool">High Schoool</option>
				<option value ="Undergraduate">Undergraduate</option>
				<option value ="Master">Master</option>
				<option value ="Post Graduate">Post Graduate</option>
			</select>
		</div>
		<div class="per-des">
			<textarea class="inner-persnal-description" rows="10" cols="50" placeholder="Personal Description: characteristics, habits..."></textarea>
		</div>
		 <input class="submit" type="submit" value="submit"/>
	</body>
</html>
