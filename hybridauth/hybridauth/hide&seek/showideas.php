<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>



<body>
<table width="733" border="1">
  <tr>
  
    <th width="54" height="32" scope="row"></th>
	<td width="59">idea_id</td>
    <td width="70">title</td>
    <td width="85">category</td>
    <td width="431">summary</td>
  </tr>

<?php
require_once('session.php');
require_once('config.php'); 
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
	//echo "111111";
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
	
$id=$_GET["id"];
$o=$mysqli->query("SELECT * FROM social_detail WHERE id_registration = '$id' ");
$e=mysqli_fetch_array($o);
$i1=$e['idea_1_id'];
$i2=$e['idea_2_id'];
$i3=$e['idea_3_id'];

//if($i1!=null)
//{
$q=$mysqli->query("select * from ideate where idea_id = '$i1'");
if($r = mysqli_fetch_array($q))
{ ?> <tr>
    <th scope="row"></th>
	<td><?php echo $r['idea_id'];  ?></td>
    <td><?php echo $r['title'];  ?></td>
    <td><?php echo $r['category'];  ?></td>
    <td><?php echo $r['summary'];  ?></td>
    </tr>
<?php } 
//}
//if(i2!=null)
//{
$q1=$mysqli->query("select * from ideate where idea_id = '$i2'");
if($r1 = mysqli_fetch_array($q1))
{?>  <tr>
    <th scope="row"></th>
	<td><?php echo $r1['idea_id'];  ?></td>
    <td><?php echo $r1['title'];  ?></td>
    <td><?php echo $r1['category'];  ?></td>
    <td><?php echo $r1['summary'];  ?></td>
    </tr>
<?php } 
//}
//if(i3!=null)
//{
$q2=$mysqli->query("select * from ideate where idea_id = '$i3'");
if($r2 = mysqli_fetch_array($q2))
{?> <tr>
    <th scope="row"></th>
	<td><?php echo $r2['idea_id'];  ?></td>
    <td><?php echo $r2['title'];  ?></td>
    <td><?php echo $r2['category'];  ?></td>
    <td><?php echo $r2['summary'];  ?></td>
    </tr>
<?php }  
$mysqli->close();
//}
?>
<a href="logout.php">Logout</a>
</body>
</html>
