<?php
session_start();

//Checking if the user alredy loged in:
if(!isset($_SESSION["logged_in"])){
  //if hasn't, will be send back to home-page:
  include("config/config.php");
  $url=MAIN_URL;
  header("Location: $url");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  include("templets/header.php")
  ?>

</head>
<body>

  <div id="wrapper">

    <?php
    include("templets/navbar.php");
    ?>


    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1>Weight <small>history</small></h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-1"></div>
    <div class="col-lg-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> General Information </h3>
        </div>
        <div class="panel-body">
          <div id=""></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add new record </h3>
      </div>
      <div class="panel-body">
        <div id="new_weight_record"></div>
      </div>
    </div>
    </div>
    <div class="col-lg-1"></div>
  </div>

  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> History Records </h3>
        </div>
        <div class="panel-body">
          <div id=""></div>
        </div>
      </div>
    </div>

  </div>


  </div>

  <?php
  include("templets/incl_script.php");
  //Being active with the navigation Bar:
  echo "<script>document.getElementById('weight_nav').className += 'selected';</script>";
  ?>

</body>
</html>
