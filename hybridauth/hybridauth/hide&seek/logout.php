<?php 
require_once('config.php'); 
require_once('session.php');
$_SESSION['adminid']=null;
$_SESSION['logged_in']=false;
session_destroy();
header("Location:index.php");
?>