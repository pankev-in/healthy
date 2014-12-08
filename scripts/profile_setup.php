<?php
session_start();
if(!empty($_POST["firstname"])||!empty($_POST["lastname"])||!empty($_POST["email"])){

  include("../config/sql_config.php");

  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can connect to database: " . mysql_error());
    mysql_close($sqlConnection);
  }

  $sx;
  if(!empty($_POST["sex"])){
    if($_POST["sex"]=="--Please Select--"){$sx='NULL';}
    else if($_POST["sex"]=="Female"){$sx='F';}
    else if($_POST["sex"]=="Male"){$sx='M';}
  }
  $into="UPDATE user SET
  first_name = '$_POST[firstname]' ,
  last_name = '$_POST[lastname]' ,
  email = '$_POST[email]' ,
  height = '$_POST[height]' ,
  sex = '$sx'
  WHERE id = '".$_SESSION["id"]."'";


    if (!mysql_query($into))
    {
      die('Error: ' . mysql_error());
      mysql_close($sqlConnection);
    }
    mysql_close($sqlConnection);
    include("../config/config.php");
    $_SESSION["just_saved_profile"] = "yes";
    $url=MAIN_URL."/profile.php";
    header("Location: $url");
    exit;
}
?>
