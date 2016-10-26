<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
require_once('session.php');
require_once('config.php'); 
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
	//echo "111111";
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
	
$adminid=$_POST["adminid"];
$pass = $_POST["password"];
$q=$mysqli->query("Select * from login where username = '$adminid'");
if(!$q)echo "errrrrrr ".mysql_error();
else{
$r=mysqli_fetch_array($q);
if(!$r)echo "fetch error";
if($pass==$r['password']){
$_SESSION["adminid"]=$adminid;
$_SESSION["logged_in"]=true;
header("Location:super admin.php");
}
else
{
echo "not match";
}

}
$mysqli->close();
?>
<a href="logout.php">Logout</a>
<body>
</body>
</html>
