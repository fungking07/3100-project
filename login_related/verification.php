<?php
  //use helper function to connect to the database
  include("ConnectDatabase.php");
  $errors = array();
  function verify(){
    global $connect;
    global $errors;
    // get the input
    $email = $_POST["email"]; //input email
    //prevent MySQL injection
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($connect,$email);
    // generate code
    if (empty($email)) {
    	array_push($errors, "Email is required");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Email must be in format 123@example.com");
		}
    //write query
    $sql = "SELECT user_id,username,email_address FROM user
    WHERE email_address = '$email' ";
    //get result according to the query in database
    $result = mysqli_query($connect,$sql);
    if ($result == False){
        // red message of user not exist
        array_push($errors, "There is no account asscoiated with this email!!!");
    }
    else{
      $userdata = mysqli_fetch_assoc($result);
    }
    //fetch the result from query into the asociative array format


    if(count($errors) == 0){
          $uid = $userdata['user_id'];
          $link = "http://localhost/AcadMap/login_related/reset.php?uid=$uid";

          $user = $userdata["username"];
          //email
          $email_to = "$email";
          $email_subject = "Please Verify Your AcadMap Account";
          $header = "From: noreply@AcapMap.com";
          $message = "Dear $user,
              This mail is to verify your email address. Please clcik the following link to rediect you to the password reset page:
                  \n\n$link\n\nThank you for using our website.\n\nRegrad,\nThe AcadMap team";

                  mail($email,$email_subject,$message,$header);
        }

    mysqli_free_result($result);
    mysqli_close($connect);

	}



	if(isset($_POST["send"])){
		verify();
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/verification.css">
    <style>
      .red{
      margin-left:35%;
      color: red;
      }
      .link{
      margin-left:81%;
      }
    </style>
	</head>
	<body>
		<div class="Reset-Password">
			Forget Password?
        </div>
        <form action="verification.php" method="post">
            <input type="text" name="email" id="email" placeholder="Email" />
            <input type="submit" name="send" id="send" type="button" ></button>
            <a href="login.php" class="link">Back to login page</a>
         </form>
         <h4 class="red"><?php include("error.php")?></h>
	</body>
</html>
