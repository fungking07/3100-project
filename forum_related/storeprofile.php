<?php
	session_start();
	$uid = $_SESSION['user_id'];
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, 'AcadMap');

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$uid = $_SESSION['user_id'];
	$datasql = "SELECT * FROM user WHERE user_id = $uid";
	$dataResult = mysqli_query($conn,$datasql);
	$userdata = mysqli_fetch_array($dataResult);

	$name = $userdata['username'];
	$email = $userdata['email_address'];

	if($name == $_GET['uname']){
		$flag = 0;
	}
	else{
		$flag = 1;
	}
	if($email == $_GET['email']){
		$flag = 0;
	}
	else{
		$flag = 2;
	}
	$edu_lv = $_GET['edu_lv'];
	$prof = $_GET['prof'];
	$inst = $_GET['inst'];
	$email = $_GET['email'];
	$major = $_GET['major'];
	$cardname = $_GET['cardname'];
	$cardnumber = $_GET['cardnumber'];
	$exmth = $_GET['exmth'];
	$exyr = $_GET['exyr'];
	$cvv = $_GET['cvv'];

	// echo 	$edu_lv.'<br>';
	// echo 	$name.'<br>';
	// echo 	$prof.'<br>';
	// echo 	$inst.'<br>';
	// echo 	$email.'<br>';
	// echo 	$major.'<br>';
	if(empty($_GET['uname'])){
		$name = $userdata['username'];
		$msg = "Username can't be empty";
		alert($msg);
	}
	else{
		$name = $_GET['uname'];
	}
	if($flag == 1){
		$username_check_query = "SELECT * FROM user WHERE username = '$name'";
		$result = mysqli_query($conn, $username_check_query);
		if($result != False){
				$user = mysqli_fetch_assoc($result);
				if ($user){ // if user exists
				if ($user['username'] == $name){
					$msg = "Username already exists";
					alert($msg);
				}
				}
			}
  	}
		elseif ($flag == 2){
			$useremail_check_query = "SELECT * FROM user WHERE email_address = '$email'";
			$result = mysqli_query($conn, $useremail_check_query);
			if($result != False){
					$user = mysqli_fetch_assoc($result);
					if ($user){ // if user exists
					if ($user['email_address'] == $email){
						$msg = "email already exists";
						alert($msg);
					}
					}
				}
		}


	$commentsql = "UPDATE user_profile SET education_level='$edu_lv', username='$name', major='$major', personal_description='$prof', institute='$inst',cvv='$cvv', expire_mth='$exmth', expire_yr='$exyr', cardname='$cardname', cardnumber='$cardnumber'  WHERE user_id=$uid";

	if (mysqli_multi_query($conn, $commentsql)) {
	//echo "New records created successfully";
	} else {
	echo "Error: " . $commentsql . "<br>" . mysqli_error($conn)."<br>";
	}

	$commentsql = "UPDATE user SET email_address='$email' WHERE user_id=$uid";

	if (mysqli_multi_query($conn, $commentsql)) {
	//echo "New records created successfully";
	} else {
	echo "Error: " . $commentsql . "<br>" . mysqli_error($conn)."<br>";
	}
	$_SESSION["username"] = $name;
	//echo "<script>history.go(-2);</script>";

?>
