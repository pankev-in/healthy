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
          <h1>Activity <small>History</small></h1>
        </div>
      </div>
    </div>

  </div>

  <?php
  include("templets/incl_script.php");
  //Being active with the navigation Bar:
  echo "<script>document.getElementById('activity_nav').className += 'selected';</script>";
  ?>

</body>
</html>
