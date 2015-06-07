<?php
session_start();
if(!empty($_POST["sign_first_name"])||!empty($_POST["sign_last_name"])||!empty($_POST["sign_email"])||!empty($_POST["sign_password"])){

  include("../config/sql_config.php");

  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can connect to database: " . mysql_error());
    mysql_close($sqlConnection);
  }

 $into= "SELECT * FROM user WHERE email='$_POST[sign_email]';";
  if(mysql_num_rows(mysql_query($into))){
    mysql_close($sqlConnection);
    include("../config/config.php");
    $_SESSION["already_regist"] = "yes";
    $url=MAIN_URL;
    header("Location: $url");
    exit;
  }

  $into="INSERT INTO user (id, first_name, last_name, email, password, sign_date, last_login,sex,height)
  VALUES (NULL,'$_POST[sign_first_name]','$_POST[sign_last_name]','$_POST[sign_email]','$_POST[sign_password]'
    ,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,NULL,NULL)";


    if (!mysql_query($into))
    {
      die('Error: ' . mysql_error());
      mysql_close($sqlConnection);
    }
    mysql_close($sqlConnection);
    include("../config/config.php");
    $_SESSION["just_regist"] = "yes";
    $url=MAIN_URL;
    header("Location: $url");
    exit;
  }


?>
