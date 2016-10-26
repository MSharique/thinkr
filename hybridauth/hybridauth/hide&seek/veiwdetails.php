
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
$sno=$_GET["id"];
?>
<body>
<table width="733" border="1">
  <tr>
  
    <th width="54" height="32" scope="row">s.no</th>
	<td width="59">userid</td>
	<td width="59">Name</td>
    <td width="70">Email</td>
	<td width="70">Date of birth</td>
	<td width="70">Gender</td>
	<td width="70">state</td>
    <td width="70">Institution</td>
	<td width="85">contact no</td>
	<td width="70">ideaid 1</td>
	<td width="70">ideaid 2</td>
	<td width="70">ideaid 3</td>
    <td width="431">idea id registration no</td>
	<td width="431">no of ideas submitted</td>
	<td width="70">registration status</td>
    
  </tr>
  <?php
  
$q=$mysqli->query("select * from social_detail where sno = '$sno'");
while($r = mysqli_fetch_array($q))
  {
  ?><tr>
    <th scope="row"><?php echo $r['sno'];  ?></th>
	<td><?php echo $r['user_id'];  ?></td>
	<td><?php echo $r['name'];  ?></td>
    <td><?php echo $r['email'];  ?></td>
	<td><?php echo $r['Date_of_birth'];  ?></td>
	<td><?php echo $r['gender'];  ?></td>
	<td><?php echo $r['state'];  ?></td>
	<td><?php echo $r['institution'];  ?></td>
    <td><?php echo $r['contact'];  ?></td>
	<td><?php echo $r['idea_1_id'];  ?><br /><a href="deleteid.php?id=<?php echo $r['id_registration']."  1";?>">delete</a></td>
	<td><?php echo $r['idea_2_id'];  ?><br /><a href="deleteid.php?id=<?php echo $r['id_registration']."  2";?>">delete</a></td>
	<td><?php echo $r['idea_3_id'];  ?><br /><a href="deleteid.php?id=<?php echo $r['id_registration']."  3";?>">delete</a></td>
    <td><?php echo $r['id_registration'];  ?></td>
	<td><?php echo $r['total_count'];  ?></td>
	<td><?php echo $r['registration_status'];  ?></td>
	</tr>
<?php
}$mysqli->close();
?>
</table>
<a href="logout.php">Logout</a>


<body>
</body>
</html>
