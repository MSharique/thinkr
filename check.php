<?php
 require_once('session.php'); 
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('config.php');

if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		header('Location: '.$logoutUrl);
		}
$name = $_GET['index'];
//echo "name = $name";
$t = $_SESSION['user_id'];
$sql1 = $mysqli->query("SELECT * FROM social_detail WHERE user_id='$t'");
if ($sql1==false)
{
    die(mysql_error());
	header('Location: '.$logoutUrl);
	}
$sql1 = mysqli_fetch_array($sql1);
if($sql1['id_registration']==$name)echo "1";
else
{
$sql = $mysqli->query("SELECT * FROM social_detail WHERE id_registration='$name'");
if ($sql==false)
{
    die(mysql_error());
	header('Location: '.$logoutUrl);
	}
$c = mysqli_num_rows($sql);
//echo "c = $c";
$temp = mysqli_fetch_array($sql);
if($c)
{
	$count = $temp['total_count'];
//	echo "total count = $count";
	if($count>=3)echo "1";
	else echo "0";
	}
else
{
	echo "1";
	}
}
$mysqli->close();	
	
?>