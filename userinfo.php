<?php 
 require_once('session.php'); 
require_once('config.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
/* connect to database using mysqli */

	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	$userid=$_SESSION['user_id'];
	$name= $_POST["name"];
	$dob = $_POST["Date_of_birth"];
	$cno= $_POST["contact"];
	$gender = $_POST["Gender"];
	$state=$_POST["state"];
	$clgname=$_POST["institution"];
	$email=$_POST["email"];
	$city=$_POST["city"];
	$string = $name;
	$arr = preg_split('#\s+#', $string, null, PREG_SPLIT_NO_EMPTY);
	//echo " first name = $arr[0] , last name = $arr[1]";
	$first=$arr[0];
	$last=$arr[1];

	$unique = mt_rand(1, 9) . mt_rand(1, 9) . substr($first, 0, 1) . substr($last, 0, 1) . mt_rand(1, 9) . mt_rand(1, 9); 
	$q=$mysqli->query("Update social_detail SET name='$name',email='$email',Date_of_birth='$dob',gender='$gender',state='$state',city='$city',institution='$clgname',contact='$cno',registration_status='1',total_count='0',id_registration='$unique' where user_id='$userid'");
//$r=mysql_query("insert into idea (userid) values ('$userid')");
	if(!$q)
	{
		echo "not connected".mysql_error();
		}
	else
	{
			$mysqli->close();

		header('Location: '.$dashUrl);
		}

?>
<body>
</body>
</html>
