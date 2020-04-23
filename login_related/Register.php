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
		$username = $_POST["username"];
		$email = $_POST["email"];
		$major = $_POST["major"];
		$education = $_POST["education"];
		$password = $_POST["password"];
		$conpassword = $_POST["confirmpassword"];
		$pd = $_POST["person"];

		//prevent sql injection
	  $firstname = stripslashes($firstname);
	  $firstname = mysqli_real_escape_string($connect,$firstname);
	  $lastname = stripslashes($lastname);
	  $lastname = mysqli_real_escape_string($connect,$lastname);
		$username= stripslashes($username);
	  $username = mysqli_real_escape_string($connect,$username);
	  $email = stripslashes($email);
	  $email = mysqli_real_escape_string($connect,$email);
		$password = stripslashes($password);
	  $password = mysqli_real_escape_string($connect,$password);
		$conpassword = stripslashes($conpassword);
	  $conpassword = mysqli_real_escape_string($connect,$conpassword);
		$major= stripslashes($major);
	  $major = mysqli_real_escape_string($connect,$major);
		$pd = stripslashes($pd);
		$pd = mysqli_real_escape_string($connect,$pd);

		$name = $firstname . $lastname;

		if (empty($username)) { array_push($errors, "Username is required"); }
  	if (empty($email)) { array_push($errors, "Email is required"); }
  	//if (empty($password)) { array_push($errors, "Password is required"); }
		if(empty($conpassword)){
			array_push($errors, "Confirm password is required");
		}
		if(empty($password)){
			array_push($errors, "Password is required");
		}
		if($password != $conpassword){
			array_push($errors, "Password not matched");
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Email must be in format 123@example.com");
		}

		$user_check_query = "SELECT * FROM user WHERE username = '$username' OR email_address = '$email'";
		$result = mysqli_query($connect, $user_check_query);
		$user = mysqli_fetch_assoc($result);
			if ($user){ // if user exists
			if ($user['username'] == $username){
				array_push($errors, "Username already exists");
			}
			if ($user['email_address'] == $email){
				array_push($errors, "email already exists");
			}
		}

		//
		if (count($errors) == 0){
		$password = substr(md5($password),0,15);
		$usersql = "INSERT INTO user(username,password,email_address) VALUES ('$username','$password','$email')";
		mysqli_query($connect,$usersql);
		$useridsql = "SELECT  user_id FROM user
		WHERE username = '$username'";
		$idresult = mysqli_query($connect,$useridsql);
		if($idresult != False){
				$userdata = mysqli_fetch_assoc($idresult);
				$userid = $userdata["user_id"];
		}
		if($userid != Null){
			$sql = "INSERT INTO user_profile(user_id,username,education_level,personal_description,major) VALUES ('$userid','$username','$education','$pd','$major')";
			if(mysqli_query($connect,$sql)){
	  		header('location: login.php');
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
		<link rel="stylesheet" href="../css/register.css">
		<style>
		.red_text{
			margin-left:65%;
			margin-top:2%;
			color: red;
		}
		</style>
	</head>
	<body style="height:800px">
		<div class="register">
			Start Your Bright Future
		</div>
		<form name="form" action="register.php" method="POST">
		<input type="text" class="first" name="first" placeholder="First Name" />
		<input type="text" class="last" name="last" placeholder="Last Name" />
		<input type="text" class="user" name="username" placeholder="Username" />
		<input type="password" class="email" name="password" placeholder="password" />
		<input type="password" class="email" name="confirmpassword" placeholder="confirm password"/>
		<input type="text" class="email" name="email" placeholder="Email Address" />
		<div class="major">
			<select name = "Faculty" >
				<option style="display: none;" value ="">Faculty</option>
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
			<select name = "education">
				<option style="display: none;" value ="">Education</option>
				<option value ="High Schoool">High Schoool</option>
				<option value ="Undergraduate">Undergraduate</option>
				<option value ="Master">Master</option>
				<option value ="Post Graduate">Post Graduate</option>
			</select>
		</div>
		<div class="per-des">
			<textarea class="inner-persnal-description" rows="10" cols="50" name = "person" placeholder="Personal Description: characteristics, habits..."></textarea>
		</div>
		 <input class="submit" type="submit" name="submit" value="submit"/>
		 <div class="red_text"><?php include('error.php'); ?></div>
	 </form>
	</body>
</html>
