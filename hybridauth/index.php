<?php 
session_start(); 
//include_once("jquery-facebook-ajax-connect/config.php");

if(isset($_GET["logout"]) && $_GET["logout"]==1)
{
	//User clicked logout button, distroy all session variables.
	session_destroy();
	header('Location: '.'http://localhost/firstWebsite/');
}
########## MySql details (Replace with yours) #############
$db_username = "root"; //Database Username
$db_password = "root"; //Database Password
$hostname = "localhost"; //Mysql Hostname
$db_name = 'test'; //Database Name
###################################################################

?>
<HTML>
<HEAD>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<TITLE>test-web</TITLE>
<BODY>
<h1>site under construction</h1>
<?php
//retrieve session data
//Print_r ($_SESSION);
//echo "Hi ". $_SESSION['user_id'];

if(!isset($_SESSION['logged_in']))
{
/*    echo '<div id="results">';
    echo '<!-- results will be placed here -->';
    echo '</div>';
    echo '<div id="LoginButton">';
	echo '<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;">Login with Facebook</a>';
    echo '<a href="google-login-api/index.php"><img style="border:0;" src="google-login-api/images/google-login-button.png" alt="HTML tutorial" width="42" height="42"></a>';
	echo '</div>';
	*/?>
	<h1>Login with Facebook,Twitter & Google</h1>
	
	<a href="login-with.php?provider=Facebook"><img src='facebook.png'></img></a> <br><br>
	<a href="login-with.php?provider=Twitter"><img src='twitter.png'></img></a> <br><br>
	<a href="login-with.php?provider=Google"><img src='google.png'></img></a><br><br>
<?php

}
else
{
	/* connect to database using mysqli */
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
	$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id=".$_SESSION['user_id']); 
		$var = mysqli_fetch_array($result);
		echo " id = ".$var['registration_status'];
		if($var['registration_status'])
		{
			echo 'Hi '. $_SESSION['user_name'].'! You are Logged in  <a href="http://localhost/firstWebsite/index.php?logout=1">Log Out</a>.';
			echo '<a href="dashboard.php">My account</a>';
			}
		else {
		echo '<br>'." registratin requires";
		header('Location: '.'http://localhost/firstWebsite/userregister.php');
		}
	
}
?>