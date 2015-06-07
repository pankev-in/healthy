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
          <h1>Profile <small>Settings</small></h1>
        </div>
      </div>
      <hr/>

      <div class="alert alert-success" id="new_setting_saved">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4>Success!</h4>
        <p>You have just changed your profile setting.
        </p>
      </div>

      <div class="alert alert-success" id="new_password_saved">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4>Success!</h4>
        <p>You have just changed your password.
        </p>
      </div>

      <div class="alert alert-warning" id="wrong_password">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4>Oh snap!</h4>
        <p>Your password is worng, please check again.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Personal Information</h3>
            </div>
            <div class="panel-body">
              <form role="form" name="personal_information_form" action="scripts/profile_setup.php" onsubmit="return check_save_profile_valid()" method="post">
                <div class="row">
                  <label for="firstname" class="col-md-2">
                    First Name:
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                  </div>
                </div>
                <div class="row">
                  <label for="firstname" class="col-md-2">
                    Last Name:
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                  </div>
                </div>
                <div class="row">
                  <label for="firstname" class="col-md-2">
                    Email Address:
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Address">
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <label for="firstname" class="col-md-2">
                    Height: (cm)
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="height" id="height" placeholder="Enter Height">
                  </div>
                </div>

                <div class="row">
                  <label for="firstname" class="col-md-2">
                    Gender:
                  </label>
                  <div class="col-md-9">
                    <select name="sex" id="sex" class="form-control">
                      <option >--Please Select--</option>
                      <option >Female</option>
                      <option >Male</option>
                    </select>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <input type="submit" value="Save" id="new_password_button" class="btn btn-success btn-block">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> New Password</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <form role="form" name="newpassword_form" action="scripts/set_new_password.php" onsubmit="return check_password_valid()" method="post">
                    <div class="form-group">
                      <input type="password" name="old_password" id="old_password" class="form-control input-sm" placeholder="Your old Password">
                    </div>
                    <div class="form-group">
                      <input type="password" name="new_password" id="new_password" class="form-control input-sm" placeholder="Your new Password">
                    </div>
                    <div class="form-group">
                      <input type="password" id="new_password_2" class="form-control input-sm" placeholder="Your new Password again">
                    </div>
                    <input type="submit" value="Save" id="new_password_button" class="btn btn-success btn-block">
                  </form>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
</div>

    <?php
    include("templets/incl_script.php");
    include("scripts/reading_user.php");
    $fn=$_SESSION['first_name'];
    $ln=$_SESSION['last_name'];
    $em=$_SESSION['email'];
    $sx=$_SESSION['sex'];
    $h=$_SESSION['height'];

    echo "<script>document.getElementsByName('firstname')[0].value='$fn';</script>";
    echo "<script>document.getElementsByName('lastname')[0].value='$ln';</script>";
    echo "<script>document.getElementsByName('email')[0].value='$em';</script>";
    if($h){echo "<script>document.getElementsByName('height')[0].value='$h';</script>";}

    if(!$sx){echo "<script>document.getElementById('sex').selectedIndex = '0';</script>";}
    else if($sx=='F'){echo "<script>document.getElementById('sex').selectedIndex = '1';</script>";}
    else if($sx=='M'){echo "<script>document.getElementById('sex').selectedIndex = '2';</script>";}
    ?>

    <script>

    $('#new_setting_saved').hide();
    $('#new_password_saved').hide();
    $('#wrong_password').hide();


    function check_password_valid(){
      var oldpw = document.forms["newpassword_form"]["old_password"].value;
      var newpw= document.forms["newpassword_form"]["new_password"].value;
      var newpw2 = document.forms["newpassword_form"]["new_password_2"].value;

      if(oldpw==0){
        alert("please enter your old password.");
        return false;
      }
      else if(newpw!=newpw2){
        alert("Passwords are not the same.");
        return false;
      }
      else if(newpw<6||!isNaN(newpw)){
        alert("Password too weak.");
        return false;
      }

    }
    function check_save_profile_valid() {
      var fn = document.forms["personal_information_form"]["firstname"].value;
      var ln = document.forms["personal_information_form"]["lastname"].value;
      var mail = document.forms["personal_information_form"]["email"].value;
      var height = document.forms["personal_information_form"]["height"].value;
      var sx = document.getElementById('sex').selectedIndex;
      var atpos = mail.indexOf("@");
      var dotpos = mail.lastIndexOf(".");

      if(fn==0||ln==0){
        alert("Please Enter your name.");
        return false;
      }

      else if (email.length==0 || atpos< 1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid Email Address.");
        return false;
      }

      else if (isNaN(height)) {
        alert("Please enter your height as number in cm, like 170 (cm)");
        return false;
      }

      else if (isNaN(sx) && (sx<0 || sx>2)) {
        alert("ERROR: Gender");
        return false;
      }
    return true;
    }

    </script>

    <?php
    //$_SESSION["just_saved_profile"]
    if(isset($_SESSION["just_saved_profile"])){
      echo "<script>$('#new_setting_saved').show();</script>";
      unset($_SESSION["just_saved_profile"]);
    }
    //$_SESSION["new_password_setted"]
    if(isset($_SESSION["new_password_setted"])){
      echo "<script>$('#new_password_saved').show();</script>";
      unset($_SESSION["new_password_setted"]);
    }
    //$_SESSION["fail_to_set_password"]
    if(isset($_SESSION["fail_to_set_password"])){
      echo "<script>$('#wrong_password').show();</script>";
      unset($_SESSION["fail_to_set_password"]);
    }

?>

  </body>
  </html>
