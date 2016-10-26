<?php 
session_start(); 
//include_once("jquery-facebook-ajax-connect/config.php");
require_once('config.php'); 

if(!isset($_SESSION['logged_in']))
{
//header('Location:logout.php');
}
/*if(isset($_GET["logout"]) && $_GET["logout"]==1)
{
	//User clicked logout button, distroy all session variables.
	session_destroy();
	header('Location: '.'http://localhost/firstWebsite/');
}*/
?>