<?php
// Start Session:
session_start();

//include Server Setup configuration file:
include("../config/config.php");
$url=MAIN_URL;

//Checking if the user alredy loged in:
if(!isset($_SESSION["logged_in"])){
  //if hasn't, will be send back to home-page:
	header("Location: $url");
}

//connecting DB:
include("../config/sql_config.php");
try{
	$sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
	mysql_select_db(SQL_DB);
}catch(Exception $e){
	die("Can not connect to database: " . mysql_error());
}

//Command for DB
$into = "INSERT INTO userweight(id, date, weight, insertdate) VALUES ('$_SESSION[user_id]','$_POST[add_weight_date]','$_POST[add_weight_kg]',null);";

if (!mysql_query($into))
{
	die('Error: ' . mysql_error());
	mysql_close($sqlConnection);
}
mysql_close($sqlConnection);
$_SESSION["weight_added"] = "yes";
$url=MAIN_URL;
header("Location: $url"."/weight.php");
exit;




?>