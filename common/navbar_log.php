<nav class="navbar navbar-inverse navbar-absolute navbar-fixed-top" id="my-navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="home.php" class="navbar-brand">Darts Pro 2016</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a>
        <li><a href="gallery.php">Gallery</a>
        <li><a href="#features">Leaderboard</a>
        <li><a href="faq.php">FAQ</a>
        <li><a href="maincontactus.php">Contact Us</a>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a > <span class="glyphicon glyphicon-user"> </span><?php echo " ".$_SESSION['username']?> </a>
        <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-cog"></span> </a>
              <ul class="dropdown-menu">
                  <li><a href="viewprofile.php">View Profile</a></li>
                  <li><a href="accountsettings.php">Account Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="loggedout.php">Log out</a></li>
              </ul>
         </li>
      </ul>
    </div>
  </div>
</nav>
