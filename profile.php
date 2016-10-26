<?php require_once('session.php');

require_once('config.php');  ?>

<link href="stylesheets/register-style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="thinkr_icon.ico">

	

 <?php 

if(!isset($_SESSION['logged_in']))
{header('Location: '.'index.php');}
/* connect to database using mysqli */
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
//	Print_r ($_SESSION);
//	echo "userid = ".$_SESSION["user_id"];
	$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id='".$_SESSION['user_id']."'"); 
	$var = mysqli_fetch_array($result);
	$user_name = $var['name'];
	//echo " user_name = $user_name";
	$email = $var['email'];
	$gender = $var['gender'];
	$dob = $var['Date_of_birth'];
	$state = $var['state'];
	$city = $var['city'];
	$cntct_no = $var['contact'];
	$inst = $var['institution'];
	$id_r = $var['id_registration'];
	$mysqli->close();
?>   	
 
<div id="container">
   
   <div id="idea_head">User Profile</div>
   <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
   <center>
	<form id="form1" name="form1" method="post" action="updateinfo.php" onSubmit="return validateForm()">
    	<table>
        	<tr>
            	<td class="label">Full Name :</td>
                <td><input name="name" type="text" id="name" onBlur="name_check('name','name_error','Use only alphabets');" value="<?php echo $user_name ?> ">
				</td>
            </tr>
            <tr id="name_error">
            </tr>
            <tr>
            	<td class="label">Gender :</td>
                <td>
                	<input type="radio" class="genderRadio" name="Gender" value="Male" id="Gender_0" <?php if($gender=='Male') {?>checked <?php } ?>>
                    <label for="Gender_0">Male</label>
            
                    <input type="radio" class="genderRadio" name="Gender" value="Female" id="Gender_1" <?php if($gender=='Female') {?>checked <?php } ?>>
                    <label for="Gender_1">Female</label>
                </td>
            </tr>
            <tr>
            	<td class="label">Date of birth :</td>
                <td><input name="Date_of_birth" id="Date_of_birth" onBlur="check_date('Date_of_birth','date_of_birth_error','Invalid date')" value="<?=$dob?>" type="text" placeholder="dd/mm/yyyy">
				</td>
            </tr>
			<tr id="date_of_birth_error">
            </tr>
            <tr>
            	<td class="label">Email ID :</td>
                <td><input name="email" id="email" type="email" value="<?=$email?>"onBlur="email_check('email','email_error','Invalid EmailID');" placeholder="user@domain.com"></td>
            </tr>
            <tr id="email_error">
            </tr>
            <tr>
            	<td class="label">State :</td>
                <td><input name="state" id="state" type="text" value="<?=$state?>" onBlur="state_check('state','state_error','Invalid state name');"></td>
            </tr>
            <tr id="state_error">
            </tr>
            <tr>
            	<td class="label">City :</td>
                <td><input name="city" id="city" type="text" value="<?=$city?>" onBlur="city_check('city','city_error','Invalid city name');"></td>
            </tr>
            <tr id="city_error">
            </tr>
            <tr>
            	<td class="label">Contact no :</td>
                <td><input name="contact" id="contact" type="text" value="<?=$cntct_no?>" onBlur="number_check('contact','contact_error','Invalid Number');"  placeholder="10-digit number"></td>
            </tr>
            <tr id="contact_error">
            </tr>
            <tr>
            	<td class="label">Institution :</td>
                <td><input name="institution" id="inst" type="text" value="<?=$inst?>" onBlur="inst_check('inst','inst_error','Invalid institution name');"></td>
            </tr>
            <tr id="inst_error">
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" class="button" name="register" value="Update"></td>
            </tr>

        </table>
        
        
    </form>
	</center>   
   </div>