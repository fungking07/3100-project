<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>chats</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat_msg.css">
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<?php
  include("ConnectDatabase.php");
  include("../navbar.php");
  if(isset($_SESSION['signed_in']) == false){
    echo "<script>
    window.location.href='/403.php';
    </script>";
  }
  $errors = array();

  function edit_post(){
    global $connect;
    global $errors;

    //get data from user
    $title = $_POST["title"];
    $post_content= $_POST["post_content"];
    $category = $_POST["category"];
    $post_id = $_GET["post_id"];
    if(!(isset($_SESSION["username"]))  and !(isset($_SESSION["user_id"]))){
      array_push($errors,"You have not login");
    }
    else{
      $name =   $_SESSION["username"] ;
      $id =  $_SESSION["user_id"];
    }
    //prevent sql inject
    $title = stripslashes($title);
	  $title = mysqli_real_escape_string($connect,$title);
	  $post_content = stripslashes($post_content);
	  $post_content = mysqli_real_escape_string($connect,$post_content);
    $category = stripslashes($category);
	  $category = mysqli_real_escape_string($connect,$category);

    //promt error if any input field is empty
    if (empty($title)) { array_push($errors, "Tilte is required");}
  	if (empty($post_content)) { array_push($errors, "Content is required");}
    if (empty($category)) { array_push($errors, "Please select a category");}


    if (count($errors) == 0){
		$usersql1 = "UPDATE forum SET post_title = '$title', category = '$category' WHERE post_id = $post_id";
    $usersql2 = "UPDATE post_content SET post_content = '$post_content' WHERE post_id = $post_id";
		$success1 = mysqli_query($connect,$usersql1);
    $success2 = mysqli_query($connect,$usersql2);
		header('location: forum.php');
  }else{
    echo "<script>alert('You have missed out some fields.');history.go(-1);</script>";
  }
  }
  if(isset($_POST["submit"])){
    edit_post();
  }
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add_post</title>
		<link rel="stylesheet" href="../css/add_post.css">
    <style media="screen">
			.bg{background: #ECE9E6;  /* fallback for old browsers */
					background: -webkit-linear-gradient(to top, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
					background: linear-gradient(to top, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
					height: 100%}
			.text{text-align:justify;font-size: 16px;}
			h1{color: rgb(100,90,255);}
			h3{color: rgb(0,191,255);}
		</style>
	</head>
	<body style="height:100%" class="bg">
		<div class="share">
			Share your experience
		</div>
    <form  method = "post">
		  <input type="text" class="title" name="title" placeholder="Post Title" />
		    <div class="major">
			       <select  name = "category">
				           <option style="display: none;" value ="">Category</option>
				           <option value ="ulife">ulife</option>
				           <option value ="study">study</option>
				           <option value ="career">Future Career</option>
			       </select>
		     </div>
		<div class="per-des">
			<textarea class="inner-persnal-description"  rows="10" cols="50" name="post_content" placeholder="Post content"></textarea>
		</div>
		 <button class="submit" type="submit" name="submit">Edit my post</button>
     <h5 class = "red_text"><?php include("error.php");?></h6>
   </form>
	</body>
</html>
