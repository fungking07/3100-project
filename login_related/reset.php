<?php
  include('ConnectDatabase.php');
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
          header("location:login.php");
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
		<title></title>
		<link rel="stylesheet" href="../css/reset.css">
	</head>
	<body>
		<div class="Reset-Password">
			Reset
		</div>
    <form action = "reset.php?uid=<?php echo $uid;?>" method="Post">
		    <input type="text" name="newpw" id="new" placeholder="New Password" />
		    <input type="text" name="confirmpw" id="confirm" placeholder="Confirm Password" />
        <div class="red_text"><?php include('error.php'); ?></div>
		    <input class="submit" name = "submit" type="submit" value="submit"/>
    </form>
	</body>
</html>
