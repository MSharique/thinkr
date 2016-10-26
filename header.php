<?php require_once('session.php'); ?>
<link rel="icon" type="image/png" href="thinkr_icon.ico">
<link href="stylesheets/header-style.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script>

	function showLogin(el)
	{
		var elm = document.getElementById(el);
		elm.style.height = "120px";
		elm.style.transition = "all .7s ease";
	}
	
	function hideLogin(el)
	{
		var elm = document.getElementById(el);
		elm.style.height = "0px";
		elm.style.transition = "all .7s ease";
	}
	
</script>

<div id="navbar">

	<a href="http://www.ietincubation.com/"><div id="incubation">An initiative by<br><span>IET INCUBATION CENTER</span></div></a>
    
    <div id="menu">
    <ul>
    	<a href="index.php"><li>Home</li></a>
        <a href="index.php#f2_poster"><li>Event</li></a>
        <a href="rules.php"><li>Rules</li></a>
        <a href="index.php#f4_timeline"><li>Timeline</li></a>
        <a href="aboutUs.php"><li>About us</li></a>
<?php
//retrieve session data
//Print_r ($_SESSION);
//echo "Hi ". $_SESSION['user_id'];

if(!isset($_SESSION['logged_in']))
{
    /*echo '<div id="results">';
    echo '<!-- results will be placed here -->';
    echo '</div>';
    echo '<div id="LoginButton">';
	echo '<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;">Login with Facebook</a>';
    echo '<a href="google-login-api/index.php"><img style="border:0;" src="google-login-api/images/google-login-button.png" alt="HTML tutorial" width="42" height="42"></a>';
	echo '</div>';*/
?>
        <li onmouseover="showLogin('login')" onmouseout="hideLogin('login');">Login / Register</li>
	
    <!-- 	link1: <a href="hybridauth/login-with.php?provider=Facebook"
    		link2: <a href="hybridauth/login-with.php?provider=Google"	 -->
    
	<div id="login" onmouseover="showLogin('login')" onmouseout="hideLogin('login');">
	
    <ul>
    	<a href="hybridauth/login-with.php?provider=Facebook"><li style="background:url(stylesheets/fb_icon.png) no-repeat 23px 11px;">Facebook</li></a>
        <a href="hybridauth/login-with.php?provider=Google"><li style="background:url(stylesheets/gm_icon.png) no-repeat 39px 12px;">Gmail</li></a>
    </ul>
    
    </div></a>
    
	</div>
<?php
}
else
{/* connect to database using mysqli */
//echo "id ".$_SESSION['user_id'];
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
	//echo "111111";
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		$t = $_SESSION['user_id'];
	$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id='$t'"); 
		if(!$result)echo "sssqqqqqqqqqqqql";
		$var = mysqli_fetch_array($result);
		if(!$var)echo "varrrrrr";
		//echo " id = ".$var['registration_status'];
		$name = $var['name']; 
		//echo $var["registration_status"];
		$temp = $name;
		$temp = substr($name,0,10);
		if($var['registration_status']==1)
		{
			?>
		<li onmouseover="showLogin('login')" onmouseout="hideLogin('login');"><?php  echo $name ?></li>
	
	<div id="login" onmouseover="showLogin('login')" onmouseout="hideLogin('login');">
	
    <ul>
    	<a href="Dashboard.php"><li>Account</li></a>
    	<a href="logout.php"><li>Logout</li></a>
    </ul>
	</div>
			<?php
			$mysqli->close();
			}
		else {
		$mysqli->close();
		//echo "errrrrrrrrrrrrrrrrrrrrr";
		header('Location: '.'register.php');
		}
	
}
?>
    </ul>
    </div>
	
</div>

