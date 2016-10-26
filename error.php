<?php 
require_once('config.php'); 
session_start(); 
$_SESSION['user_id']=null;
$_SESSION['user_name']=null;
$_SESSION['email']=null;
$_SESSION['login']=false;
session_destroy();

?>

Click <a href="index.php" >here </a> to continue;