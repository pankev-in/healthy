
<?php
//connecting DB:
  include("config/sql_config.php");
  try{
    $sqlConnection = mysql_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
    mysql_select_db(SQL_DB);
  }catch(Exception $e){
    die("Can not connect to database: " . mysql_error());
  }


	$into="SELECT * FROM userweight;";
  $result = mysql_query($into);
/*
  for ($i =0 ; $i<mysql_num_rows($result);$i++){
  	$row = mysql_fetch_row($result);
   	$id = $row[0];
  	$firstname = $row[1];
  	$lastname = $row[2];
  	echo "User Id ist: ".$id."<br>";
  	echo "User firstname ist: ".$firstname."<br>";
  	echo "User lastname ist: ".$lastname."<br>";
  	echo "<hr>";
  } */



$json=array();
  while ($row = mysql_fetch_assoc($result)) {
    $json[] = $row;
  }

  
  json_encode($json);

  mysql_close($sqlConnection);

?>