<?php
session_start();
include("../config/config.php");

if(!empty($_POST["login_email"])||!empty($_POST["login_password"])){
    $login_email=$_POST["login_email"];
    $login_pw=$_POST["login_password"];

  //connecting DB:
  include("../config/sql_config.php");
  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can not connect to database: " . mysql_error());
  }

  //Comman for DB
  $into="SELECT * FROM user WHERE email = '{$login_email}' AND Password = '{$login_pw}'";
  $result = mysql_query($into);
    if(mysql_num_rows($result)!=0){
        $row = mysql_fetch_row($result);
        mysql_close($sqlConnection);
        $_SESSION["user_email"] = $login_email;
        $_SESSION["logged_in"] = "yes";
        $_SESSION["user_id"] = $row[0];

        $url=MAIN_URL."/dashboard.php";
        header("Location: $url");
        exit;
      }
    else{
        mysql_close($sqlConnection);
        $_SESSION["failed_login"]="yes";
        $url=MAIN_URL;
        header("Location: $url");
        exit;

    }
}

?>
