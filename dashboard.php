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
      include("templets/sample_page_wrapper.php");
    ?>

  </div>

  <?php
    include("templets/incl_script.php");
    //Being active with the navigation Bar:
    echo "<script>document.getElementById('dashboard_nav').className += 'selected';</script>";
  ?>

</body>
</html>
