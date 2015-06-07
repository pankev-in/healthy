<?php
session_start();
if(!empty($_POST["new_password"])||!empty($_POST["old_password"])){

  include("../config/sql_config.php");

  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can connect to database: " . mysql_error());
    mysql_close($sqlConnection);
  }

  $into="SELECT * FROM user WHERE id = '".$_SESSION["id"]."' AND Password = '$_POST[old_password]'";
  $result = mysql_query($into);
  if(mysql_num_rows($result)!=0){
    $into="UPDATE user SET password = '$_POST[new_password]' WHERE id = '".$_SESSION["id"]."'";
    $result = mysql_query($into);
    if (!mysql_query($into))
    {
      die('Error: ' . mysql_error());
      mysql_close($sqlConnection);
    }
    $_SESSION["new_password_setted"]="YES";
  }
  else{
    $_SESSION["fail_to_set_password"]="YES";
  }
  mysql_close($sqlConnection);
  include("../config/config.php");
  $url=MAIN_URL."/profile.php";
  header("Location: $url");
  exit;

}
?>
