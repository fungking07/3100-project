<!-- 
PROGRAM forum.php - forum  
PROGRAMMER: Lee Pak Hei 1155109311
CALLING SEQUENCE: 
- navbar.php -> user_post_history.php
Where filter button is for sorting by date, likes and filter by category.
Where Add Post button is for accessing add post.
 -->
<?php
    define('MYSQL_ASSOC',MYSQLI_ASSOC);
    include("../ConnectDatabase.php");
    include("../navbar.php");
    if(isset($_SESSION['signed_in']) == false){
      echo "<script> 
      window.location.href='/403.php';
      </script>";
    }
    $uid = $_SESSION["user_id"];
    $sql = "SELECT * FROM forum WHERE author_id= $uid";
    $result = mysqli_query($connect, $sql);

    $postinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if(isset($_POST["find"])){
   //echo "finding...\n"; //cannot go in to the loop
  $cat_flag = ($_POST["category"] == "all") ? false : true;

  $date_flag = 0;
  switch($_POST['date']){
    case 'default':
      $date_flag = 0; break;
    case 'Oldest':
      $date_flag = 1; break;
    case 'Newest':
      $date_flag = 2; break;
  }

  $likes_flag = 3;
  switch($_POST['likes']){
    case 'default':
      $likes_flag = 3; break;
    case 'Least':
      $likes_flag = 4; break;
    case 'Most':
      $likes_flag = 5; break;
  }
  //echo $cat_flag."\n";
  //echo $date_flag."\n";
  //echo $likes_flag."\n";
  if($cat_flag){  //need to find cat
    $cat = $_POST['category'];
    switch ($date_flag) {
      case 0:
        switch($likes_flag){ 
          case 3: 
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY like_number DESC";  break;
        }
        break;
      case 1:
        switch($likes_flag){
          case 3:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date ASC";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date ASC, like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date ASC, like_number DESC";  break;
        }
        break;
      case 2:
        switch($likes_flag){
          case 3:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date DESC";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date DESC, like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE category = '".$cat."' and author_id= $uid Order BY Post_date DESC, like_number DESC";  break;
        }
        break;
    }
  }
  else
  {
    switch ($date_flag) {
      case 0:
        switch($likes_flag){
          case 3:
            $sql = "SELECT * FROM forum WHERE author_id= $uid";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY like_number DESC";  break;
        }
        break;
      case 1:
        switch($likes_flag){
          case 3:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date ASC";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date ASC, like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date ASC, like_number DESC";  break;
        }
        break;
      case 2:
        switch($likes_flag){
          case 3:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date DESC";  break;
          case 4:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date DESC, like_number ASC"; break;
          case 5:
            $sql = "SELECT * FROM forum WHERE author_id = $uid Order BY Post_date DESC, like_number DESC";  break;
        }
        break;
    }
  }
  //echo $sql."\n";
  $result = mysqli_query($connect,$sql);
  $postinfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>Forum skeleton</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>

<body>
<!-- add -->
  <div class="container-fluid">
        <!--Posts -->
        <div class="col-sm-9">
      <?php include("FetchPost.php") ?>
    </div>
    <!-- Filter -->
    <div class="col-sm-3">
      <!-- The following code is adapt from https://www.w3schools.com/howto/howto_js_collapsible.asp -->
      <button class="collapsible">Filter</button>
        <div class="content">
          <h3>Categroies:</h3>
          <form action ='#' method = "POST">
          <input type="radio" id="all" name="category" value="all" checked>
          <label for="all"> ALL category</label><br>
          <input type="radio" id="ulife" name="category" value="ulife">
          <label for="ulife"> University life</label><br>
          <input type="radio" id="study" name="category" value="study">
          <label for="study"> University study</label><br>
          <input type="radio" id="career" name="category" value="career">
          <label for="career"> Future career</label><br>
          <hr>
          <h3>Post date:</h3>
          <input type="radio" id="default" name="date" value="default" checked>
          <label for="default"> default</label><br>
          <input type="radio" id="Oldest" name="date" value="Oldest">
          <label for="Oldest"> Oldest</label><br>
          <input type="radio" id="Newest" name="date" value="Newest">
          <label for="Newest"> Newest</label><br>
          <hr>
          <h3>Sort by:</h3>
          <input type="radio" id="default" name="likes" value="default" checked>
          <label for="default"> default</label><br>
          <input type="radio" id="Least" name="likes" value="Least">
          <label for="Least"> Least likes</label><br>
          <input type="radio" id="Most" name="likes" value="Most">
          <label for="Most"> Most likes</label><br>
          <hr>
          <input class="submit btn btn-success" type="submit" name="find" value="find"/>
        </form>
      </div>
      <!-- Adapatation ends here -->
    </div>

  </div>

  <!--The following code is adapt from https://www.w3schools.com/howto/howto_js_collapsible.asp-->
  <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }
    </script>
    <!--Adapatation ends here-->
</body>