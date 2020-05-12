<!--
PROGRAM forum.php - forum
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- forum.php
- navbar.php -> forum.php
Where filter button is for sorting by date, likes and filter by category.
Where Add Post button is for accessing add post.
 -->
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
          $link = "http://localhost/login_related/reset.php?uid=$uid";

          $user = $userdata["username"];
          //email
          $email_to = "$email";
          $email_subject = "Please Verify Your AcadMap Account";
          $header = "From: noreply@AcapMap.com";
          $message = "Dear $user,
              This mail is to verify your email address. Please clcik the following link to rediect you to the password reset page:
                  \n\n$link\n\nThank you for using our website.\n\nRegrad,\nThe AcadMap team";

                  mail($email,$email_subject,$message,$header);

                  echo "<script>
                  alert('Email has sent!!Check your email!');
                  </script>";
        }

    mysqli_free_result($result);
    mysqli_close($connect);

	}



	if(isset($_POST["send"])){
		verify();
	}
 ?>
<!--
PROGRAM ForgetPw_UI
PROGRAMMER: Chung Tsz Ting 1155110208, SU Hong Jin 1155124500 Tso Sze Long Angus 1155109296
CALLING SEQUENCE: verification.html -> verfication.php -> login.php
Where 'forget' button on login page is clicked
 -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/verification.css">
    <style>
      .red{
      margin-left:25%;
      margin-top: 2%;
      color: red;
      }
      .link{
      margin-left:81%;
      }
      .submit{
        margin-top: 1%;
        margin-left: 25%;
      	background: transparent;
      	color: #6B5B95;
      	border: 3px solid #6B5B95;
      	border-radius: 50px;
      	padding: 0.8rem 2rem;
      	font: 18px "Margarine", sans-serif;
      	outline: none;
      	cursor: pointer;
      	position: relative;
      	transition: 0.2s ease-in-out;
      	letter-spacing: 2px;
      }
      .submit:hover {background-color: #66CCCC;border: 5px solid #66CCCC;}
      .submit:active {
        background-color: #66CCCC;
        border: 5px solid #66CCCC;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
      }
    </style>
	</head>
	<body>
		<div class="Reset-Password">
			Reset Password
    </div>
    <form action="verification.php" method="post">
        <input class="send" type="text" name="email" id="email" placeholder="Email" />
        <br><br>
            <button type="submit" name="send" class ="submit">submit</button>
        <br><br>
        <a href="login.php" style="margin-left:25%" class ="submit">Back to login page</a>
     </form>
     <h4 class="red"><?php include("error.php")?></h>
	</body>
</html>
