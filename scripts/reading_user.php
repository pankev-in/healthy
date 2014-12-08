<?php

//Connecting DB:
include("config/sql_config.php");
try{
  $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
  mysql_select_db(SQL_DB);
}catch(Exception $e){
  die("Can connect to database: " . mysql_error());
}

//Getting user information:
$user_email = $_SESSION["user_email"];
$into="SELECT * FROM user WHERE email = '{$user_email}'";
$result = mysql_query($into);
$row = mysql_fetch_assoc($result);


$_SESSION["id"]=$row["id"];
$_SESSION["first_name"]=$row["first_name"];
$_SESSION["last_name"]=$row["last_name"];
$_SESSION["email"]=$row["email"];
$_SESSION["sex"]=$row["sex"];
$_SESSION["height"]=$row["height"];

mysql_close($sqlConnection);

?>
