<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">AcadMap</a>
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION["signed_in"])){
              echo "<li><a href='../forum_related/forum.php'>Forum</a></li>";
              echo "<li><a href='../chat_related/chat_messages.php'>Chat</a></li>";
              echo "<li><a href='../forum_related/myprofile.php'>My Profile</a></li>";
              echo "<li><a href='../forum_related/user_post_history.php'>Post History</a></li>";
              echo "<li>Welcome, ".$_SESSION['username']."!</li>";
              echo "<li><a href='logout.php'>Logout</a></li>";
          }else{
              echo "<li><a href='../forum_related/forum.php'>Forum</a></li>";
              echo "<li><a href='../login_related/login.php'>Login</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
