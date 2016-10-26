<?php 
//session_start(); 
//include_once("jquery-facebook-ajax-connect/config.php");
require_once('config.php');
require_once('session.php'); 
/*
if(isset($_GET["logout"]) && $_GET["logout"]==1)
{
	//User clicked logout button, distroy all session variables.
	session_destroy();
	header('Location: '.'http://localhost/firstWebsite/');
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dashboard</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylesheets/dash-idea-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/dashboard-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/dash-idea-style.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/dash-ideaForm-style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="thinkr_icon.ico">

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
  <?php include("header.php"); ?>
	<?php include("dashpanel.php"); ?>
<?php
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		
if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
else
{
		//echo 'Hi '. $_SESSION['user_name'].'! You are Logged in  <a href="logout.php">Log Out</a>.';
		$userid=$_SESSION["user_id"];
		$t = $_SESSION['user_id'];
		$t=$mysqli->query("select * from social_detail where user_id='$t'");
		if(!$t)
		{
			echo "not connected".mysql_error();
			header('Location: '.$logoutUrl);
			}
		$r=mysqli_fetch_array($t);
  
		$count = $r['total_count'];
		$count++;
		//echo '<br>'." count = $count";
		//if($count>4) header('Location: '.$redirectUrl.'/src/dashboard.php?error=limit');
		$idea_no = $_GET['idea'];
		//echo '<br>'." idea_num = $idea_no";
		$generated = "false";
		if($idea_no==1)
		{
			$id = $r['idea_1_id'];
			if($id==null)
			{
				$id = uniqid('thinkr');
				$generated = "true";
				}
			}
		else if($idea_no==2)
		{
			$id = $r['idea_2_id'];
			if($id==null)
			{
				$id = uniqid('thinkr');
				$generated = "true";
				}
			}
		else if($idea_no==3)
		{
			$id = $r['idea_3_id'];
			if($id==null)
			{
				$id = uniqid('thinkr');
				$generated = "true";
				}
			}
		}
		
?>
<?php 
if($generated=="false")
{	
//echo '<br>'." id = ".$id;
//echo " false generated";
$tep = $mysqli->query("SELECT * FROM ideate WHERE idea_id='$id'");
if(!$tep)
{	
	echo "error11111111111111111111".mysql_error();
	header('Location: '.$logoutUrl);
	}
$temp = mysqli_fetch_array($tep);
if(!$temp)
{
	echo '<br>'."error22222222222222".mysql_error();
	//header('Location: '.$logoutUrl);
	}
$x = $temp['submit'];
//echo " submit_status = ".$x." mem = ".$temp['members'];
$mem = $temp['members'];
if($temp['submit']==0)
{
?>
    <div id="container">
	<div id="idea_head">Idea <?PHP echo $idea_no ?>: Submission form</div>
        <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
        <center>
	<form id="form1" name="form1" method="post" action="insertidea.php" onsubmit="return validateFormDraft()">
                <table>
                    <tr>
                        <td class="label">A Title for your idea :</td>
                        <td><input name="title" id="title" value="<?php echo $temp['title'];?>" type="text" onBlur="validateTitle('title','title_error','Atleast one character is needed');" ></td>
						<input name="idea_id" type="hidden" id="idea" value="<?php echo $id ?>" />
						<input name="generate" type="hidden" id="generate" value="<?php echo $generated ?>" />
						<input name="idea_no" type="hidden" id="idea_no" value="<?php echo $idea_no ?>" />
						<input name="no_of_members" type="hidden" value="<?php echo $temp['members']?>"/>
                    </tr>
					<tr id="title_error">
					</tr>
                    <tr>
                        <td class="label">Select theme(s) that are related to your idea  :</td>
                        <td>
                            <input name="check_list[]" id="healthcare" class="chkBox" type="checkbox" value="Healthcare" <?php if(strpos($temp['category'],'Healthcare') != False) {?> checked <?php } ?> ><label class="chkBoxLabel" for="healthcare">Healthcare</label>
                            &nbsp;<input name="check_list[]" id="society" class="chkBox" type="checkbox" value="Society" <?php if(strpos($temp['category'],'Society') != False) {?> checked <?php } ?> ><label class="chkBoxLabel" for="society">Society</label><br>
                            <input name="check_list[]" id="finance" class="chkBox" type="checkbox" value="Finance" <?php if(strpos($temp['category'],'Finance') != False) {?> checked <?php } ?>><label class="chkBoxLabel" for="finance">Finance</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="check_list[]" id="lifestyle" class="chkBox" type="checkbox" value="Lifestyle" <?php if(strpos($temp['category'],'Lifestyle') != False) {?> checked <?php } ?>><label class="chkBoxLabel" for="lifestyle">Lifestyle</label><br>
                            <input name="check_list[]" id="education" class="chkBox" type="checkbox" value="Education" <?php if(strpos($temp['category'],'Education') != False) {?> checked <?php } ?> ><label class="chkBoxLabel" for="education">Education</label>
							&nbsp;&nbsp;&nbsp;<input name="check_list[]" id="others" class="chkBox" type="checkbox" value="Others"onchange="enableOthers()" <?php if(strpos($temp['category'],'Others') != False) {?> checked <?php } ?> ><label class="chkBoxLabel" for="others">Others</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">If 'Others' is selected , please provide those theme(s) :</td>
                        <?php if(strpos($temp['category'],'Others') != False) {
						$loc = strpos($temp['category'],'Others');
						?>
                        <td><input name="otheroption" id="otherTheme" value="<?php echo substr($temp['category'],$loc+7,strlen($temp['category'])); ?>" value="<?php echo "   "?>" type="text"></td>
							<?php 
						}
								else { ?>
						<td><input name="otheroption" id="otherTheme" disabled="true" value="<?php echo "   "?>" type="text"></td>
						<?php } ?>	
					</tr>
					<tr>
						<td class="label">No. of contributors for this idea (including you) :</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $temp['members']?> </td>
					</tr>
                    <tr>
                        <td  class="label">A short description of your idea : </td>
                        <td><textarea name="ideasum" cols="600" class="ideaSum" placeholder="Max 600 characters" onKeyPress="return charLimit(this)" onKeyUp="return characterCount(this)"><?php echo $temp['summary'] ?></textarea>
                        <br><span id="charac"><span id="char_num"><?php $len = 600-strlen($temp['summary']); echo $len;?></span> characters remaining</span>
						</td>
					</tr>
                    <tr>
                        <td><input type="submit" class="button"  name="draft_form" value="Save changes"></td>
                        <td><input type="submit" class="button"  name="submit_form" value="Submit Idea"></td>
                    </tr>
                </table>
            </form>
</center>
    
	</div>
<?php 
}
else
{
?>
	 
    	<div id="idea_head"></div>
    
		<div id="container">
    	<div id="idea_head">!dea <?php echo $idea_no ;?>: <?php echo $temp['title']; ?></div>
         <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div><br>
		<div class="ideaSummary">
		Theme(s): <?php $arr = preg_split('#\s+#',$temp['category'], null, PREG_SPLIT_NO_EMPTY);
	$str = null;
	foreach($arr as $value)
	{
		if($value == 'Others')continue;
		$str  = $str.', '.$value;
		}
		echo substr($str,2,strlen($str));
	?><br>
	Contributors :  <?php echo $mem;?><br><br>
	<?php echo $temp['summary']; ?></div>
    </div>
		
    
	
<?php
	}
	
}
else
{
//echo '<br>'." generted true ";
?>
    	
    <div id="container">

    	<div id="idea_head">!dea <?PHP echo $idea_no ?>: Submission form</div>
        <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
        <center>
	<form id="form1" name="form1" method="post" action="insertidea.php" onsubmit="return validateFormNew()">
                <table>
                    <tr>
                        <td class="label">A Title for your idea :</td>
                        <td><input name="title" id="title" type="text" onblur="validateTitle('title','title_error','Atleast a char is needed')"><br><span id="titleError" style="display: none;"><font color="red" size="2.25">Error</font></span></td>
						<input name="idea_id" type="hidden" id="idea" value="<?php echo $id ?>" />
						<input name="generate" type="hidden" id="generate" value="<?php echo $generated ?>" />
						<input name="idea_no" type="hidden" id="idea_no" value="<?php echo $idea_no ?>" />
					
                    </tr>
                    <tr id="title_error">
					</tr>
                    <tr>
                        <td class="label">Select theme(s) that are related to your idea  :</td>
                        <td>
                            <input name="check_list[]" id="healthcare" class="chkBox" type="checkbox" value="Healthcare"><label class="chkBoxLabel" for="healthcare">Healthcare</label>
                            &nbsp;<input name="check_list[]" id="society" class="chkBox" type="checkbox" value="Society"><label class="chkBoxLabel" for="society">Society</label><br>
                            <input name="check_list[]" id="finance" class="chkBox" type="checkbox" value="Finance"><label class="chkBoxLabel" for="finance">Finance</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="check_list[]" id="lifestyle" class="chkBox" type="checkbox" value="Lifestyle"><label class="chkBoxLabel" for="lifestyle">Lifestyle</label><br>
                            <input name="check_list[]" id="education" class="chkBox" type="checkbox" value="Education"><label class="chkBoxLabel" for="education">Education</label>
                            &nbsp;&nbsp;&nbsp;<input name="check_list[]" id="others" class="chkBox" type="checkbox" value="Others" onchange="enableOthers()"><label class="chkBoxLabel" for="others">Others</label>
                        </td>
                    </tr>
                    <tr id="check_error">
                    </tr>
                    <tr>
                        <td class="label">If 'Others' is selected , please provide those theme(s) :</td>
                        <td><input name="otheroption" id="otherTheme" disabled="true" type="text"></td>
                    </tr>
                    <tr>
                        <td class="label">No. of contributors for this idea (including you) :</td>
                        <td><select name="no_of_members" id="no_of_members"  class="member" onchange="otherField(this); validateSelect();" onblur="validateSelect()">
                          <option selected></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
						
                    </tr>
                    <tr id="no_members_error">
                    </tr>
                    <tr id="others_1">
                    </tr>
                    <tr id="member_error_1">
    				</tr>
                    <tr id="others_2">
                    <tr id="member_error_2">
    				</tr>    
                    </tr>
                    <tr>
                        <td  class="label">A short description of your idea : </td>
                        <td><textarea name="ideasum" cols="600" class="ideaSum" placeholder="Max 600 characters" onKeyPress="return charLimit(this)" onKeyUp="return characterCount(this)"></textarea>
                        <br><span id="charac"><span id="char_num">600</span> characters remaining</span>
						</td>
					</tr>
                    <tr>
                        <td><input type="submit" class="button"  name="draft_form" value="Save changes"></td>
                        <td><input type="submit" class="button"  name="submit_form" value="Submit Idea"></td>
                    </tr>
                </table>
            </form>
</center>
    
	</div>
<?php 
}
$mysqli->close();	
?>
 </body>
</html>


</body>
</html>
