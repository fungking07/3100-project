<!--
PROGRAM reset.php
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- verification.php-> email link -> reset.php
PURPOSE:For user to input new password and store it to database
DATA STRUCTURES:
array error :string array for storing error message
variable connect:for storing the connection of database
variable $_POST[new]:Global variable storing new password
variable $_POST[confirmpw]:Global variable storing confirm password
variable sql:for storing query that inset the user input into database
ALGORITHM:
changepw():For user to change their password and encrypt it to store to database.
Only accessible by link in verification email
 -->
<?php
  include('ConnectDatabase.php');
  include("../navbar.php");
  $errors = array();
  $uid = $_GET["uid"];

  function changepw(){
    global $connect;
    global $errors;
    global $uid;

    $newpw = $_POST["newpw"];
    $confimpw = $_POST["confirmpw"];

    //prevent sql injection
    $newpw = stripslashes($newpw);
    $newpw = mysqli_real_escape_string($connect,$newpw);
    $confimpw = stripslashes($confimpw);
    $confimpw = mysqli_real_escape_string($connect,$confimpw);

    if (empty($newpw)) {array_push($errors, "password is required"); }
  	if (empty($confimpw)) {array_push($errors, "Confirm password needed"); }
    if($newpw != $confimpw){array_push($errors,"passsword not match");}


    if(count($errors)==0){
        //save data to database
        //sql for inset data to database
        $password = substr(md5($newpw),0,15);
        $sql = "UPDATE user SET password = '$password' where user_id = '$uid'";
        //check if data save to database sucessfully
        if(mysqli_query($connect,$sql)){
          echo "<script>
  						alert('RESET Password SUCESSFUL');
  						window.location.href='login.php';
  						</script>";
        }
        else{
          //prompt error
          array_push($errors,'query error:' . mysqli_error($connect));
          exit(1);
          }
      }
      mysqli_close($connect);
      }



  if(isset($_POST["submit"])){
    changepw();
  }
?>



<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Reset</title>
    <link rel="icon" href="/assets/favicon.png" type="image/png"/>
		<link rel="shortcut icon" href="assets/favicon.ico" />
		<link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
      body { background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);}
      .red{
      margin-left:45%;
      margin-top: 1%;
      color: red;
      }
      .Reset-password{
          font-family: "Courier New", Courier, monospace;
          color:#FFDF00	;
      }
    </style>
	</head>
	<body>
		<div class="Reset-Password">
			Reset
		</div>
    <form action = "reset.php?uid=<?php echo $uid;?>" method="Post">
		    <input type="text" name="newpw" id="new" placeholder="New Password" />
		    <input type="text" name="confirmpw" id="confirm" placeholder="Confirm Password" />
        <input class="submit" name = "submit" type="submit" value="submit"/>
        <div class="red"><?php include('error.php'); ?></div>

    </form>
	</body>
</html>
