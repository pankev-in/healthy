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



    <div class="alert alert-success hidden" id="weight_add_success">
      <button data-dismiss="alert" class="close" type="button">×</button>
      <h4>Success!</h4>
      <p>You have just added a new record.
      </p>
    </div>


    <div class="row">
      <div class="col-lg-9">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> General Information </h3>
          </div>
          <div class="panel-body">
            <!-- BODY IS HERE -->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add new record </h3>
          </div>
          <div class="panel-body">
            <form role="form" name="add_weight_form" action="scripts/add_weight_record.php" onsubmit="return weight_check()"method="post">
              <div class="form-group">
                <input type="text" name="add_weight_kg" id="add_weight_kg" class="form-control input-sm" placeholder="Weight in kg">
              </div>
              <div class="form-group">
                <input type="date" name="add_weight_date" id="add_weight_date" class="form-control input-sm">
              </div>
              <input type="submit" value="Add" id="add_weight_button" class="btn btn-success btn-block">
            </form>          
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> History Records </h3>
          </div>
          <div class="panel-body">
            <!-- BODY IS HERE -->
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

  <!-- Including some JS sources needed in this page:-->
  <link type="text/css" rel="stylesheet" href="js/jsgrid-1.1.0/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="js/jsgrid-1.1.0/jsgrid-theme.min.css" />
  <script type="text/javascript" src="js/jsgrid-1.1.0/jsgrid.min.js"></script>
  


  <!-- JS code for this page:-->
  <script>
  function weight_check(){
    var kg = document.forms["add_weight_form"]["add_weight_kg"].value;
    var date= document.forms["add_weight_form"]["add_weight_date"].value;
    if (kg >300 || kg<0||kg ==0 || isNaN(kg)){
      alert("Please enter a possible value");
      return false;
    }
    else if (date == ''){
      alert("Please select date");
      return false;
    }
    return true;
  }
  </script>

<?php
if(isset($_SESSION["weight_added"])){
  echo "<script>$('#weight_add_success').removeClass('hidden');</script>";
  unset($_SESSION["weight_added"]);
}
?>
</body>
</html>