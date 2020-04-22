<?php
  //use helper function to connect to the database
  function verify(){
    include(ConnectDatabase.php);
    // get the input
    $email = $_POST["email"]; //input email
    //prevent MySQL injection
    $email = stripslashes($email);
    $email = mysql_real_escape_string($email);
    // generate code
    //write query
    $sql = "SELECT email_address FROM user
    WHERE email_address = '$email' ";
    //get result according to the query in database
    $result = mysqli_query($connect,$sql);
    //fetch the result from query into the asociative array format
    $userdata = mysqli_fetch_all($result,MySQLI_ASSOC);
    if ($result == NULL){
        // red message of user not exist
        echo "user with you email address not exist.";
    }
    else{
        $code = substr(md5(uniqid(rand(), true)), 8, 8);
        $sql = "UPDATE user SET verify_code ='$code' WHERE email_address = '$email'";
        if(mysqli_query($connect,$sql)){
            echo "code set in database.";
        }
        else{
            echo "Error: set code";
        }
        //email
        $email_to = "$email";
        $email_subject = "Please Verify Your AcadMap Account";
        $header = "From: noreply@AcapMap.com";
        $message = "Dear $user,/n
            This mail is to verify your email address. Please enter the following verification code:
                \n\n$code\n\nThank you.\n\nRegrads,\nThe AcadMap team";
                
        mail($email,$email_subject,$message,[$header]);
	}
	mysql_free_resul($result);
    mysqli_close($connect);
}
    function compare(){
    include(ConnectDatabase.php);
	// get the input
	$email = $_POST["email"]; //input email
    //prevent MySQL injection
    $email = stripslashes($email);
	$email = mysql_real_escape_string($email);
	//
    $verify_code = $_POST["code"]; //input = code
	$verify_code = stripslashes($verify_code);
	$verify_code = mysql_real_escape_string($verify_code);
	$sql = "SELECT verify_codeFROM user
    WHERE email_address = '$email' ";
	if($code == $verify_code){
		$_SESSION["email"]= $email;
		header("reset.php");
	}
	else{
		echo "vertification code not match.";
	}
	mysql_free_resul($result);
    mysqli_close($connect);
}

	if(isset($_GET["send"])){
		verify();
	}
	if(isset($_GET["submit"])){
		compare();
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
			}
			html{
				background:url(reset.jpeg) no-repeat center center fixed;
				background-size: cover;
			}
			.Reset-Password{
				margin-top:150px;
				margin-left:37%;
				font-size: 50px;
				font-family: 'Cooper Black';
				color:#8b7765;
			}
			#email{
				margin-left:25%;
				margin-top:80px;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 20px;
				border-radius: 20px;
				border-color: gray;
				padding-left: 1%;
				outline: none;
			}
			#code{
				display:inline-block;
				margin-left:25%;
				margin-top:50px;
				width: 35%;
				height:35px;
				border-style: solid;
				font-size: 20px;
				border-radius: 20px;
				border-color: gray;
				padding-left: 1%;
				outline: none;
			}
			#send{
				display:inline-block;
				margin-left:2%;
				width: 13%;
				height:42px;
				border-radius: 20px;
				padding-left: 1%;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
				outline: none;
				background-color: white;
			}
			.submit{
				margin-left:47%;
				margin-top:65px;
				width: 10%;
				height:35px;
				border-radius: 20px;
				text-align: center;
				border-style: none;
				background-color: #4876ff;
				font-size: 16px;
			}
			
		</style>
	</head>
	<body>
		<div class="Reset-Password">
			Forget Password?
        </div>
        <form action="verifcation.php">
            <input type="text" name="email" id="email" placeholder="Email" />
            <input type="submit" name="send" id="send" type="button" onclick="verify()">Email</button>
            <input type="text" name="code" id="code" placeholder="Verification code" />
            <input class="submit" type="submit" value="submit" onclick="compare()"/>
         </form>
	</body>
</html>
