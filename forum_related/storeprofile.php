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
	$name = $_GET['uname'];
	$email = $_GET['email'];
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

	echo 	$edu_lv.'<br>';
	echo 	$name.'<br>';
	echo 	$prof.'<br>';
	echo 	$inst.'<br>';
	echo 	$email.'<br>';
	echo 	$major.'<br>';


		$commentsql = "UPDATE user_profile SET education_level='$edu_lv', username='$name', major='$major', personal_description='$prof', institute='$inst',cvv='$cvv', expire_mth='$exmth', expire_yr='$exyr', cardname='$cardname', cardnumber='$cardnumber'  WHERE user_id=$uid";

		if (mysqli_multi_query($conn, $commentsql)) {
		//echo "New records created successfully";
		} else {
		echo "Error: " . $commentsql . "<br>" . mysqli_error($conn)."<br>";
		}

		$commentsql = "UPDATE user SET email_address='$email', username='$name' WHERE user_id=$uid";

		if (mysqli_multi_query($conn, $commentsql)) {
		//echo "New records created successfully";
		} else {
		echo "Error: " . $commentsql . "<br>" . mysqli_error($conn)."<br>";
		}
		$_SESSION["username"] = $name;
		echo "<script>history.go(-2);</script>";



?>