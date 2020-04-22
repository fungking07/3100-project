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
		$usersql = "INSERT INTO forum(post_title,author_id,author_name,category) VALUES ('$title','0','abc','$category')";
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
			$sql = "INSERT INTO post_content(post_id,post_content,like_number) VALUES ('$post_id','$post_content','$like')";
      $ok = mysqli_query($connect,$sql);
			if($ok){
	  		header('location: forum.php');
			}
      else{
        array_push($errors, "Errors!!Please try again later!!");
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
		<title></title>
		<style type="text/css">
			*{
				margin:0;
				padding:0;
				outline:none;
			}
			/*  */
			html{
				background:url(../assets/post_bac.png) no-repeat center center fixed;
				background-size: cover;
			}
			.share{
				margin-left:42%;
				margin-top:3%;
				text-align: center;
				font-size: 40px;
				font-family: 'Cooper Black';
				margin-bottom: 25px;
				color:skyblue;
			}

			input:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			input:focus{
				border-width: 2px;
				border-color: skyblue;
			}
			.major:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.major:active{
				border-width: 2px;
				border-color: skyblue;
			}

			.per-des:hover{
				border-width: 2px;
				border-color: skyblue;
			}
			.per-des:active{
				border-width: 2px;
				border-color: skyblue;
			}

			.title{
				margin-left:45%;
				margin-top:2%;
				width: 49%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
				padding-left: 1%;
			}
			.major{
				margin-left:45%;
				margin-top:2%;
				width: 50%;
				height:35px;
				border-style: solid;
				font-size: 16px;
				border-color: gray;
			}
			select{
				border:none;
				width:100%;
				height:100%;
				appearance: none;
				font-size: 16px;
				padding-left: 1%;
			}

			.per-des{
				margin-left:45%;
				margin-top:2%;
				width: 49%;
				height:150px;
				border-style: solid;
				border-color: gray;
				padding-left: 1%;
				text-align: center;
			}
			.inner-persnal-description{
				border:none;
				width:100%;
				height:90%;
				appearance: none;
				font-size: 16px;
				margin-left:-2%;
				padding-left: 1%;
				padding-top: 1%;
			}
			.submit{
				margin-left:65%;
				margin-top:2%;
				width: 10%;
				height:35px;
				text-align: center;
				border-style: none;
				background-color: rgb(115,255,99);
				font-size: 16px;
			}
      .red_text{
        margin-left:65%;
				margin-top:2%;
        color: red;
      }
		</style>

	</head>
	<body style="height:2000px">
		<div class="share">
			Share your experience
		</div>
    <form action ="add_post.php" method = "post">
		  <input type="text" class="title" name="title" placeholder="Post Title" />
		    <div class="major">
			       <select  name = "category">
				           <option style="display: none;" value ="">major</option>
				           <option value ="ulife">ulife</option>
				           <option value ="study">study</option>
				           <option value ="Education">Education</option>
				           <option value ="Engineering">Engineering</option>
				           <option value ="Law">Law</option>
				           <option value ="Medicine">Medicine</option>
				           <option value ="Science">Science</option>
				           <option value ="Social Sciennce">Social Science</option>
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
