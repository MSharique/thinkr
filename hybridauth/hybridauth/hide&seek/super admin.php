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
	
?>
<body>
<table width="733" border="1">
  <tr>
  
    <th width="54" height="32" scope="row">s.no</th>
	<td width="59">Name</td>
    <td width="70">Email</td>
    <td width="85">contact no</td>
    <td width="431">idea id registration no</td>
	<td width="431">no of ideas submitted</td>
    <td width="59">veiw ideas</td>
    <td width="59">veiw full detail</td>
	<td width="59">delete</td>
  </tr>
  <?php
  
$q=$mysqli->query("select * from social_detail");
while($r = mysqli_fetch_array($q))
  {
  ?><tr>
    <th scope="row"><?php echo $r['sno'];  ?></th>
	<td><?php echo $r['name'];  ?></td>
    <td><?php echo $r['email'];  ?></td>
    <td><?php echo $r['contact'];  ?></td>
    <td><?php echo $r['id_registration'];  ?></td>
	<td><?php echo $r['total_count'];  ?></td>
	<td><a href="showideas.php?id=<?php echo $r['id_registration']; ?>">view ideas</a></td>
	<td><a href="veiwdetails.php?id=<?php echo $r['sno']; ?>">view details</a></td>
	<td><a href="delete.php?id=<?php echo $r['sno']; ?>">delete</a></td>
	</tr>
<?php
}
$mysqli->close();
?>
<a href="logout.php">Logout</a>
</table>

</body>
</html>
