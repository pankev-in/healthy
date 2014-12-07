<?php

session_start();
session_destroy();
include("config/config.php");
$url=MAIN_URL;
header("Location: $url");
?>
