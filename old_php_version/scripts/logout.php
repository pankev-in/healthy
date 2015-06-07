<?php

session_start();

include("../config/sql_config.php");

try{
  $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
  mysql_select_db(SQL_DB);
}catch(Exception $e){
  die("Can connect to database: " . mysql_error());
  mysql_close($sqlConnection);
}
$into="UPDATE user SET last_login = CURRENT_TIMESTAMP WHERE id = '".$_SESSION["id"]."' ";
if (!mysql_query($into))
{
  mysql_close($sqlConnection);
  die('Error: ' . mysql_error());
}

mysql_close($sqlConnection);
session_destroy();
include("../config/config.php");
$url=MAIN_URL;
header("Location: $url");
?>
