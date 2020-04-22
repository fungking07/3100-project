<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand">AcadMap</a>
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION["signed_in"])){
              echo "<li><a href=#>Forum</a></li>";
              echo "<li><a href=#>Chat</a></li>";
              echo "<li><a href=#>Consultation</a></li>";
              echo "<li><a href=#>Welcome, ".$_SESSION['username']."!</a></li>";
              echo "<li><a href=#>Logout</a></li>";
          }else{
              echo "<li><a href=#>Forum</a></li>";
              echo "<li><a href=#>Login</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
