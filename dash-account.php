<?php 
//session_start(); 
require_once('config.php'); 
require_once('session.php'); 
?>
<link href="stylesheets/account.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="thinkr_icon.ico">
<?php
		
if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
else
{
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		header('Location: '.$logoutUrl);
		}
		//echo 'Hi '. $_SESSION['user_name'].'! You are Logged in  <a href="logout.php">Log Out</a>.';
		$un=$_SESSION['user_id'];

		$q=$mysqli->query("SELECT * FROM social_detail where user_id='$un'");
		$r=mysqli_fetch_array($q);
		if(!$r)
		{
		echo "mysql connection error".mysql_error();
		}
		//echo " id ==== ".$r['id_registration'];
		//if(isset(strcmp($_GET['error'],"limit"))echo "More than 3 idea ,Not allowed";
		$id1 = $r['idea_1_id'];
		$id2 = $r['idea_2_id'];
		$id3 = $r['idea_3_id'];
		
?>

<div id="container">
	<div id="idea_head">Account</div>
    
    <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
    
    <div id="details">
    	<center><span><?php echo $r['name'] ?></span><br>Unique User-ID : <?php echo $r['id_registration'] ?><br><?php echo $r['email']?><br>
		<?php echo $r['institution']?><br><br>Click the panels on the left or below for accessing the submission areas</center>
    </div>
    
    
    
    <center><div id="ideaBar">
    	<center>
        <?php 
	/*echo "id1 = ".$id1.'<br>';
		echo "id1 = ".$id2.'<br>';
		echo "id1 = ".$id3.'<br>';
	*/if($id1==null) { ?>
	<div id="idea" onclick="setData('submit_idea.php',1);">!dea 1<br><br><span>NOT YET<br>STARTED</span></div>
	<?php }
		else 
		{
			$temp = $mysqli->query("SELECT * FROM ideate where idea_id='$id1'");
			if(!$temp)header('Location : '.$errorUrl);
			$t = mysqli_fetch_array($temp);
			
			if($t['submit']==1)
			{ ?>
			<div id="idea" onclick="setData('submit_idea.php',1);">!dea 1<br><br><span>SUBMITTED<br><br></span></div>
			<?php
			}
			else
			{?>
					<div id="idea" onclick="setData('submit_idea.php',1);">!dea 1<br><br><span>PROGRESS<br>SAVED</span></div>
				<?php }
			}
			?>
    <?php if($id2==null) { ?>
	<div id="idea" onclick="setData('submit_idea.php',2);">!dea 2<br><br><span>NOT YET<br>STARTED</span></div>
	<?php }
		else 
		{
			$temp = $mysqli->query("SELECT * FROM ideate where idea_id='$id2'");
			$t = mysqli_fetch_array($temp);
			if($t['submit']==1)
			{ ?>
			<div id="idea" onclick="setData('submit_idea.php',2);">!dea 2<br><br><span>SUBMITTED<br><br></span></div>
			<?php
			}
			else
			{?>
					<div id="idea" onclick="setData('submit_idea.php',2);">!dea 2<br><br><span>PROGRESS<br>SAVED</span></div>
				<?php }
			}
			?>
    <?php if($id3==null) { ?>
	<div id="idea" onclick="setData('submit_idea.php',3);">!dea 3<br><br><span>NOT YET<br>STARTED</span></div>
	<?php }
		else 
		{
			$temp = $mysqli->query("SELECT * FROM ideate where idea_id='$id3'");
			$t = mysqli_fetch_array($temp);
			if($t['submit']==1)
			{ ?>
			<div id="idea" onclick="setData('submit_idea.php',3);">!dea 3<br><br><span>SUBMITTED<br><br></span></div>
			<?php
			}
			else
			{?>
					<div id="idea" onclick="setData('submit_idea.php',3);">!dea 3<br><br><span>PROGRESS<br>SAVED</span></div>
				<?php }
			}
			?>
    </center>
    </div></center>
    
  <center>
    	<div id="contact_thinkr">For any assistance contact - <br>Ishan +91-8959165508<br>Sharique +91-9713009806</div>
    </center>

</div>
<?php $mysqli->close();
		?>
		
<?php }
?>
