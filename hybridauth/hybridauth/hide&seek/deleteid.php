<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
require_once('session.php');
require_once('config.php'); 
$temp = $_GET["id"];
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
	//echo "111111";
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
$arr = preg_split('#\s+#', $temp, null, PREG_SPLIT_NO_EMPTY);
	//echo " first name = $arr[0] , last name = $arr[1]";
	$id=$arr[0];
	$sno=$arr[1];
if($sno==1)
{
$q=$mysqli->query("update social_detail set idea_1_id = '',total_count=total_count-1 where id_registration = '$id'");
if(!$q)
{
echo mysql_error();
}
else
{
header("location:super admin.php");
}

}
else if($sno==2)
{
$q=$mysqli->query("update social_detail set idea_2_id = '',total_count=total_count-1 where id_registration = '$id'");
if(!$q)
{
echo mysql_error();
}
else
{
header("location:super admin.php");
}

}
else if($sno==3)
{
$q=$mysqli->query("update social_detail set idea_3_id = '',total_count=total_count-1 where id_registration = '$id'");
if(!$q)
{
echo mysql_error();
}
else
{
header("location:super admin.php");
}
}
$mysqli->close();
?>
<a href="logout.php">Logout</a>
<body>
</body>
</html>
