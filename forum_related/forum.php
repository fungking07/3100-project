<?php
  define('MYSQL_BOTH',MYSQLI_BOTH);
  define('MYSQL_NUM',MYSQLI_NUM);
  define('MYSQL_ASSOC',MYSQLI_ASSOC);
  include("ConnectDatabase.php");

  $sql = 'SELECT * FROM forum';
  $usersql = 'SELECT * FROM user Order BY user_ID';
  //get result accoriding to the query
  $defaultresult = mysqli_query($connect,$sql);
  $userresult = mysqli_query($connect,$usersql);

  $postinfo = mysqli_fetch_all($defaultresult, MYSQLI_ASSOC);
  $userinfo = mysqli_fetch_assoc($userresult);


  if (isset($_Post["ulife"])){
  $filter = "SELECT * FROM forum Where category = 'ulife'";
  $postinfo = mysqli_fetch_all($filter,MySQLI_ASSOC);
  }
  //search is not implemented

  //navigation bar should be implement by html(still not done)


  //output forum post prototype
  //code skeleton of output forum post -->
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
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand">AcadMap</a>
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="#">Forum</a></li>
          <li><a href="#">Chat</a></li>
          <li><a href="#">Consultation</a></li>
          <!-- <input type="text" placeholder="Search.."> -->
          <li><a href="#">Welcome, User!</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <!-- Filter -->
    <div class="col-md-2">
      <!-- The following code is adapt from https://www.w3schools.com/howto/howto_js_collapsible.asp -->
      <button class="collapsible">Filter</button>
        <div class="content">
          <h3>Categroies:</h3>
          <form action ='forum.php' method = "post">
          <input type="checkbox" id="ulife" name="ulife" value="ulife">
          <label for="ulife"> University life</label><br>
          <input type="checkbox" id="study" name="study" value="study">
          <label for="study"> University study</label><br>
          <input type="checkbox" id="career" name="career" value="career">
          <label for="career"> Future career</label><br>
          <hr>
          <h3>Post date:</h3>
          <input type="checkbox" id="1wless" name="1wless" value="1wless">
          <label for="1wless"> Less than 1 week</label><br>
          <input type="checkbox" id="1wto2w" name="1wto2w" value="1wto2w">
          <label for="1wto2w"> 1 week to 2 weeks</label><br>
          <input type="checkbox" id="2wto1m" name="2wto1m" value="2wto1m">
          <label for="2wto1m"> 2 weeks to 1 month</label><br>
          <input type="checkbox" id="1mup" name="1mup" value="1mup">
          <label for="1mup"> More then 1 month</label><br>
          <hr>
          <h3>Likes:</h3>
          <input type="checkbox" id="10lesslikes" name="10lesslikes" value="10lesslikes">
          <label for="10lesslikes"> Less than 10 likes</label><br>
          <input type="checkbox" id="10to50likes" name="10to50likes" value="10to50likes">
          <label for="10to50likes"> 10 to 50 likes</label><br>
          <input type="checkbox" id="50to100likes" name="50to100likes" value="50to100likes">
          <label for="50to100likes"> 50 to 100 likes</label><br>
          <input type="checkbox" id="100uplikes" name="100uplikes" value="100uplikes">
          <label for="100uplikes"> More than 100 likes</label><br>
        </form>
          <hr>
          <a href="#" class="btn btn-success">Find Post</a>
        </div>
      </div>
      <
      <!-- Adapatation ends here -->
    </div> -->
    <!--Posts -->
    <div class="col-md-12">
      <?php include("FetchPost.php") ?>
    </div>
  </div>

  <!--The following code is adapt from https://www.w3schools.com/howto/howto_js_collapsible.asp-->
  <!-- <script>
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
    </script> -->
    <!--Adapatation ends here-->
</body>
