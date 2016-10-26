<html>
<head>
<title>Dashboard</title>

<link href="stylesheets/dashboard-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/dash-idea-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/dash-ideaForm-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/account.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="thinkr_icon.ico">

<script src="script_files/dashboard.js"></script>
<script src="script_files/idea-form.js"></script>
<script src="script_files/profilevalidation.js"></script>

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body bgcolor="F7F7F5">
	<?php include("dashpanel.php"); ?>
    
    <?php include("header.php"); ?>
    	
	<div id="main" style="padding-bottom:50px;"><?php include("dash-account.php"); ?></div>       
</body>
</html>