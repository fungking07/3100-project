<?php
	session_start();
	include("../navbar.php");
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

	$edu_lv = $_GET['edu_lv'];
	$name = $_GET['uname'];
	$prof = $_GET['prof'];
	$inst = $_GET['inst'];
	$email = $_GET['email'];
	$major = $_GET['major'];

	// echo 	$edu_lv.'<br>';
	// echo 	$name.'<br>';
	// echo 	$prof.'<br>';
	// echo 	$inst.'<br>';
	// echo 	$email.'<br>';
	// echo 	$major.'<br>';

	$commentsql = "UPDATE user_profile SET education_level='$edu_lv', username='$name', major='$major', personal_description='$prof', institute='$inst' WHERE user_id=$uid";

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
	echo "<script>history.go(-2);</script>";

?>