<!--
PROGRAM Register.php - forum
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- login.php -> register.php
Where filter button is for sorting by date, likes and filter by category.
Where Add Post button is for accessing add post.
VERSION 1: written 15-4-2020
REVISION 1.1: 12-5-2020 to improve UI
PURPOSE:For people to register by inputting correct infomation(with checking)
DATA STRUCTURES:
variable connect:for storing database connection
variable $_POST[first]:Global variable storing user firstname
variable $_POST[last]:Global variable storing user lastname
variable $_POST[submit]:Global variable storing input from submit button
variable $_POST[password]:Global variable storing password
variable $_POST[confirmpassword]:Global variable storing conpassword
variable $_POST[faculty]:Global variable storing user faculty
variable $_POST[education]:Global variable storing education level
variable user_check_query :for storing query that check if user existed
variable useridsql:for storing query that enable us to find the user id and store other data to the other table by using foreign key
variable sql:for storing query that inset the user input into database
variable userresult:for storing query result
variable useridresult:for storing query result
variable result:for storing query result
variable userdata:store all record fetched form query result
variable userid:store all record fetched form query result
variable user:store all record fetched form query result
variable userdata:store all record fetched form query result
array error :string array for storing error message
ALGORITHM:
register():For user to register.If user input correct info ,
it will store user data to database .Otherwise promt error to user
 -->
<?php
	//use helper function to connect to the database
	include("ConnectDatabase.php");
	//To store all error message
	$errors = array();
	//
	if(isset($_SESSION['signed_in']) == true){
    echo "<script>
    alert('You have been logged in. Redirecting you to our forum.');
    window.location.href='../forum_related/forum.php';
    </script>";
  }

	function register(){
		//variable declaration
		global $connect;
		global $errors;


		//get data from user inpuy
		$firstname = $_POST["first"];
		$lastname = $_POST["last"];
		$username = $_POST["username"];
		$email = $_POST["email"];
		$major = $_POST["Faculty"];
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
	//
 ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/register.css">
		<style>
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
		<div class="per-des">
			<textarea class="inner-persnal-description" rows="10" cols="50" name = "person" placeholder="Personal Description: characteristics, habits..."></textarea>
		</div>
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
		 <input class="submit" type="submit" name="submit" value="submit"/>
		 <div class="red_text"><?php include('error.php'); ?></div>
	 </form>
	</body>
</html>
