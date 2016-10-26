<?php 
require_once('config.php'); 
session_start(); 
$_SESSION['user_id']=null;
$_SESSION['user_name']=null;
$_SESSION['email']=null;
$_SESSION['login']=false;
session_destroy();
header('Location: '.$redirectUrl);
?>