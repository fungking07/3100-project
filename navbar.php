<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand">AcadMap</a>
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="#">Forum</a></li>
          <li><a href="#">Chat</a></li>
          <li><a href="#">Consultation</a></li>
          <!-- <input type="text" placeholder="Search.."> -->
          <?php
          if($_SESSION["signed_in"] == true){
              
              echo "<li><a href='#'>Welcome, ".$_SESSION['username']."!</a></li>";
              echo "<li><a href=‘#’> Logout</a></li>";
          }else{
              echo "<li><a href='#'>Welcome, Visitor!</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
