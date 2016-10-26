<?php 
//session_start(); 
require_once('config.php'); 
require_once('session.php'); 
?>

<link href="stylesheets/dashpanel-style.css" rel="stylesheet" type="text/css" />

<div id="sidePanel">
<?php
if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
?>

<div class="imageTags">
	<ul>
		<li style="margin-top:0px;" onclick="setData('dash-account.php');">Account</li>
		<li onclick="setData('submit_idea.php',1);">!dea 1</li>
		<li onclick="setData('submit_idea.php',2);">!dea 2</li>
		<li onclick="setData('submit_idea.php',3);">!dea 3</li>
		<li onclick="setData('profile.php');">Profile</li>
	</ul>
</div>

</div>
