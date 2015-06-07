<?php

session_start();

if(isset($_SESSION["logged_in"])){
	include("config/config.php");
	$url=MAIN_URL."/dashboard.php";
	header("Location: $url");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HealthIE | A Simple Health Tracker</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

	<!-- CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="assets/css/animations.css" rel="stylesheet">
	<link href="assets/css/style_worthy.css" rel="stylesheet">

</head>

<body class="no-trans">
	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

	<!-- header start -->
	<!-- ================ -->
	<header class="header fixed clearfix navbar navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div class="logo smooth-scroll">
							<a href="#banner"><img id="logo" src="assets/img/logo.png" alt="HealthIE"></a>
						</div>

						<!-- name-and-slogan -->
						<div class="site-name-and-slogan smooth-scroll">
							<div class="site-name"><a href="#banner">HealthIE</a></div>
							<div class="site-slogan"> Just A Health Tracker</div>
						</div>

					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-8">

					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- ================ -->
						<div class="main-navigation animated">

							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">

									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
										<ul class="nav navbar-nav navbar-right">
											<li><a href="#" data-toggle="modal" data-target="#login" class="btn btn-success square-btn-adjust">Login</a></li>
											<li><a href="#" data-toggle="modal" data-target="#sign" class="btn btn-primary square-btn-adjust">Sign</a></li>

										</ul>
									</div>

								</div>
							</nav>
							<!-- navbar end -->

						</div>
						<!-- main-navigation end -->

					</div>
					<!-- header-right end -->

				</div>
			</div>
		</div>
	</header>
	<!-- header end -->

	<!-- banner start -->
	<!-- ================ -->
	<div id="banner" class="banner">
		<div class="banner-image"></div>
		<div class="banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 object-non-visible center" data-animation-effect="fadeIn">
						<h1 class="text-center">This is <span>HealthIE</span></h1>
						<p class="lead text-center">A Web-based <b>daily activity-tracker</b>. Which can help you to improve
							your body condition by constantly monitoring your diet and tracking you activities.
						</p>
						<p class="lead text-center">Scroll to <b>learn More</b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- banner end -->

	<!-- footer start -->
	<!-- ================ -->
	<footer id="footer">
		<!-- .subfooter start -->
		<!-- ================ -->
		<div class="subfooter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="text-center">Copyright © 2014 by <a target="_blank" href="http://k-pan.com">Kevin Pan</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- .subfooter end -->

	</footer>
	<!-- footer end -->

	<div class="modal fade" id="login" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#5cb85c;">
					<h3 style="color:white;">Login</h3>
				</div>
			</br>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<form role="form" name="login_form" action="scripts/login.php" onsubmit="return login_validateForm()" method="post">
						<div class="form-group">
							<input type="email" name="login_email" id="login_email" class="form-control input-sm" placeholder="email">
						</div>
						<div class="form-group">
							<input type="password" name="login_password" id="login_password" class="form-control input-sm" placeholder="Password">
						</div>
						<input type="submit" value="Login Now" id="login_button" class="btn btn-success btn-block">
					</form>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</br>
	</div>
</div>
</div>


<div class="modal fade" id="sign" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 style="color:white;">Sign</h3>
			</div>
		</br>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<form role="form" name="register_form" action="scripts/register.php" onsubmit="return sign_validateForm()" method="post">
					<div class="form-group">
						<input type="text" name="sign_first_name" id="sign_first_name" class="form-control input-sm" placeholder="First Name">
					</div>
					<div class="form-group">
						<input type="text" name="sign_last_name" id="sign_last_name" class="form-control input-sm" placeholder="Last Name">
					</div>
					<div class="form-group">
						<input type="email" name="sign_email" id="sign_email" class="form-control input-sm" placeholder="Email Address">
					</div>

					
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="sign_password" id="sign_password" class="form-control input-sm" placeholder="Password">
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" id="sign_password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
              </div>
            </div>
          </div>


					<input type="submit" value="Register" id="sign_button" class="btn btn-primary btn-block">
				</form>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</br>
</div>
</div>
</div>


<div class="modal fade" id="succsess_sign" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center;">
			<div class="modal-header" style="background-color:#5cb85c;">
				<h3 style="color:white;">System</h3>
			</div></br>
			<h3 style="color:#5cb85c;">Thank you for your registration, please login</h3>
		</br>
	</br>
</div>
</div>
</div>

<div class="modal fade" id="fail_regist" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center;">
			<div class="modal-header" style="background-color:red">
				<h3 style="color:white;">System</h3>
			</div></br>
			<h3 style="color:red">This email address has already been registed</h3>
		</br>
	</br>
</div>
</div>
</div>

<div class="modal fade" id="fail_login" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center;">
			<div class="modal-header" style="background-color:red">
				<h3 style="color:white;">System</h3>
			</div></br>
			<h3 style="color:red">Wrong login Information</h3>
		</br>
	</br>
</div>
</div>
</div>


<!-- JavaScript files -->

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/modernizr.js"></script>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.appear.js"></script>
<script type="text/javascript" src="assets/js/template.js"></script>
<script>
function sign_validateForm() {
	var first_name = document.forms["register_form"]["sign_first_name"].value;
	var last_name = document.forms["register_form"]["sign_last_name"].value;
	var email = document.forms["register_form"]["sign_email"].value;
	var password_1 = document.forms["register_form"]["sign_password"].value;
	var password_2 = document.forms["register_form"]["sign_password_confirmation"].value;
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");

	if (first_name.length==0||last_name.length==0) {
		alert("Your name please.");
		return false;
	}

	else if (email.length==0) {
		alert("Not a valid Email Address.");
		return false;
	}

	else if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		alert("Not a valid Email Address.");
		return false;
	}

	else if (password_1.length<6 || !isNaN(password_1)) {
		alert("Your Password is too Weak, plase choose a better one");
		return false;
	}

	else if (password_1!=password_2) {
		alert("Passwords are not the same!");
		return false;
	}


}
function login_validateForm() {
	var email = document.forms["login_form"]["login_email"].value;
	var password = document.forms["login_form"]["login_password"].value;

	if (email.length==0) {
		alert("Please fill your login email address");
		return false;
	}

	if (password.length==0) {
		alert("Please fill your login password");
		return false;
	}
}

</script>
<?php

if(isset($_SESSION["just_regist"])){
	echo "<script>$('#succsess_sign').modal('show');</script>";
	unset($_SESSION["just_regist"]);
}

if(isset($_SESSION["already_regist"])){
	echo "<script>$('#fail_regist').modal('show');</script>";
	unset($_SESSION["already_regist"]);
}

if(isset($_SESSION["failed_login"])){
	echo "<script>$('#fail_login').modal('show');</script>";
	unset($_SESSION["failed_login"]);
}


?>
</body>
</html>
