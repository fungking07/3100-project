<?php
  include("ConnectDatabase.php");
  $errors = array();

  function add_post(){
    global $connect;
    global $errors;

    //get data from user
    $title = $_POST["title"];
    $post_content= $_POST["post_content"];
    $category = $_POST["category"];
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
		$usersql = "INSERT INTO forum(post_title,author_id,author_name,category) VALUES ('$title','$id','$name','$category')";
		$success = mysqli_query($connect,$usersql);
       if (!$success) {
         $post_id =  false;
       }else {
        $post_id = mysqli_insert_id($connect);
    }
    $likesql = "SELECT  like_number FROM forum
    WHERE post_id = '$post_id'";

    $likeresult = mysqli_query($connect,$likesql);
    if($likeresult != False){
        $postdata = mysqli_fetch_assoc($likeresult);
        $like = $postdata["like_number"];
    }
		if($post_id != false && $like != Null){
			$sql = "INSERT INTO post_content (post_id,post_content,like_number) VALUES ('$post_id','$post_content','$like')";
      $ok = mysqli_query($connect,$sql);
			if($ok){
	  		header('location: forum.php');
			}
      else{
        array_push($errors, "Errors!!Please try again later!!");
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
      }

  }
  }
}

  if(isset($_POST["submit"])){
    add_post();
  }

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add_post</title>
		<link rel="stylesheet" href="../css/add_post.css">

	</head>
	<body style="height:2000px">
		<div class="share">
			Share your experience
		</div>
    <form action ="add_post.php" method = "post">
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
		 <button class="submit" type="submit" name="submit">Add new post</button>
     <h5 class = "red_text"><?php include("error.php");?></h6>
   </form>
	</body>
</html>
