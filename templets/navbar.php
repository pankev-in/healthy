<?php

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php" style="color:#339beb;"> HealthIE :: Dashboard</a>
  </div>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li id="new_nav"><a href="add_new.php"><i class="fa fa-plus-circle"></i> Add new</a></li>
      <li id="dashboard_nav"><a href="dashboard.php"><i class="fa fa-pie-chart"></i> Dashboard</a></li>
      <li id="activity_nav"><a href="activity.php"><i class="fa fa-bicycle"></i> My Activity</a></li>
      <li id="diet_nav"><a href="diet.php"><i class="fa fa-beer"></i> My Diet</a></li>
      <li id="weight_nav"><a href="weight.php"><i class="fa fa-calculator"></i> My Weight</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right navbar-user">
      <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">
        </i> Welcome, <?php echo $_SESSION["user_email"];?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
          <!--<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>-->
          <li class="divider"></li>
          <li><a href="scripts/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>

        </ul>
      </li>
      <li><a href="#"><?php echo date('jS \of F Y'); ?></a></li>
    </ul>
  </div>
</nav>
