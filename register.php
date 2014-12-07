<?php
session_start();
if(!empty($_POST["sign_first_name"])||!empty($_POST["sign_last_name"])||!empty($_POST["sign_email"])||!empty($_POST["sign_password"])){

  include("config/sql_config.php");

  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can connect to database: " . mysql_error());
  }

  $into="INSERT INTO user (id, first_name, last_name, email, password, sign_date, last_login)
  VALUES (NULL,'$_POST[sign_first_name]','$_POST[sign_last_name]','$_POST[sign_email]','$_POST[sign_password]'
    ,CURRENT_TIMESTAMP,NULL)";


    if (!mysql_query($into))
    {
      die('Error: ' . mysql_error());
    }
    include("config/config.php");
    $_SESSION["just_regist"] = "yes";
    $url=MAIN_URL;
    header("Location: $url");
    exit;
  }


?>
