<?php //require_once('session.php');
//require_once('config.php');  
error_reporting(0);?>
<html>
<head>
<title>Register</title>

<link href="stylesheets/register-style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="thinkr_icon.ico">

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script>


	/***************************** My Script *****************************/
	
	//Ajax to fetch the error from the coressponding php file
	function getError(target,txt)
	{
		var xml = new XMLHttpRequest();
		xml.onreadystatechange = function(){
			
			if(xml.readyState==4 && xml.status==200)
			{
				document.getElementById(target).innerHTML = xml.responseText;
			}
		}
		
		xml.open("POST","formError.php?msg="+txt,true);
		xml.send();
		
	}
	//validate name
	function name_check(self,target,txt){
      var content = document.getElementById(self).value;
	  var re = /[A-Za-z -']$/;
	  if(re.test(content)){
        document.getElementById(target).innerHTML = "";
        return true;
      }else{
      getError(target,txt);
        return false; 
      }
    }
	//Validation for Email
	function email_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		if(re.test(content)){
			document.getElementById(target).innerHTML = "";
			return true;
			}
		else
		{
			getError(target,txt);
			return false;
			}
	}
	
	//Validation for State
	function state_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		var re = /[A-Za-z -']$/;
		if(re.test(content)){
			document.getElementById(target).innerHTML = "";
			return true;
			}
		else
		{
			getError(target,txt);
			return false;
			}
	}
	
	
	//Validation for City
	function city_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		var re = /[A-Za-z -']$/;
		if(re.test(content)){
			document.getElementById(target).innerHTML = "";
			return true;
			}
		else
		{
			getError(target,txt);
			return false;
			}
	}
	
	
	//Validation for Contact Number
	function number_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		var reg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
		////window.alert("phone number is  valid");  
		if(!reg.exec(content)){
			getError(target,txt);
			return false;
			}
		else
		{
			document.getElementById(target).innerHTML = "";
			return true;
			}
	}

	//Validation for Institution Name
	function inst_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		
		if(content==""){
			getError(target,txt);
			return false;
			}
		else{
			document.getElementById(target).innerHTML = "";
			return true;
			}
	}
	
	//validation for date
	function check_date(self,target,txt) {
        var date = document.getElementById(self).value;
        var pattern = /^([0-9]){2}(\/){1}([0-9]){2}(\/)([0-9]){4}$/;   //defining pattern for date
		var temp;
		temp = pattern.test(date);
		if (temp==true) {
        	document.getElementById(target).innerHTML = "";
			return true;
        } 
        else
		{
			getError(target,txt);
			return false;
			}
    }
	
	/***************************** End of My Script *****************************/
	//form validation	  
function validateForm(){
//window.alert("I'm activating!");
      // Set error catcher
      var error = 0;
//window.alert("Initialisation done");
      // Check name
      if(!name_check('name','name_error','Use only alphabets')){
        //document.getElementById('nameError').style.display = "block";
        error++;
      }
//window.alert("After name");
      // Validate email
      if(!email_check('email','email_error','Invalid EmailID')){
        //document.getElementById('emailError').style.display = "block";
        error++;
      }

      // Check state
      if(!state_check('state','state_error','Invalid state name')){
       // document.getElementById('stateError').style.display = "block";
        error++;
      }
//window.alert("After state");
      // Check city
      if(!state_check('city','city_error','Invalid city name')){
	    //document.getElementById('city').style.background ='#D7CE22';
        //document.getElementById('cityError').style.display = "block";
        error++;
      }
//window.alert("After city");
	// Check inst
      if(!inst_check('inst','inst_error','Invalid institution name')){
        //document.getElementById('instError').style.display = "block";
        error++;
      }
//window.alert("After inst");
	  
	  //validate contact number
	  if(!number_check('contact','contact_error','Invalid Number')){
        //document.getElementById('contactError').style.display = "block";
        error++;
      }
	//validate date
	  if(!check_date('Date_of_birth','date_of_birth_error','Invalid Date')){
        //document.getElementById('contactError').style.display = "block";
        error++;
      }

      if(error > 0){
	  /*message = "x is equal to ";
document.write (message); // prints the value of the message variable
        */
		
		return false;
      }
    }   
	
</script>	
  
</head>

<body>
    
    <?php include("header1.php"); ?>

	<?php 


/* connect to database using mysqli */
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
//	Print_r ($_SESSION);
	//echo "userid = ".$_SESSION["user_id"];
	$t = $_SESSION['user_id'];
	$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id='$t'"); 
	$var = mysqli_fetch_array($result);
	$user_name = $var['name'];
	//echo " user_name = $user_name";
	$email = $var['email'];
	//echo " user_email = $email";
	$st = $var['registration_status'];
	//echo " st = $st";
	$mysqli->close();
	if($st==1)
	{
		echo "You Can't this page.";
		header('Location: '.'index.php');
		}
	else {
?> 	
    	
   <center><div id="registerBoard">
   
   <div id="idea_head">Register Yourself</div>
   <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
   <center>
	<form id="form1" name="form1" method="post" action="userinfo.php" onSubmit="return validateForm()">
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
                	<input type="radio" class="genderRadio" name="Gender" value="Male" id="Gender_0" checked onBlur="validateRadio(id)">
                    <label for="Gender_0">Male</label>
            
                    <input type="radio" class="genderRadio" name="Gender" value="Female" id="Gender_1" onBlur="validateRadio(id)">
                    <label for="Gender_1">Female</label>
                </td>
            </tr>
            <tr>
            	<td class="label">Date of birth :</td>
                <td><input name="Date_of_birth" id="Date_of_birth" onBlur="check_date('Date_of_birth','date_of_birth_error','Invalid format')" type="text" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr id="date_of_birth_error">
            </tr>
            <tr>
            	<td class="label">Email ID :</td>
                <td><input name="email" id="email" value="<?php echo $email?>"type="email" onBlur="email_check('email','email_error','Invalid EmailID');" placeholder="user@domain.com"></td>
            </tr>
            <tr id="email_error">
            </tr>
            <tr>
            	<td class="label">State :</td>
                <td><input name="state" id="state" type="text" onBlur="state_check('state','state_error','Invalid state name');"></td>
            </tr>
            <tr id="state_error">
            </tr>
            <tr>
            	<td class="label">City :</td>
                <td><input name="city" id="city" type="text" onBlur="state_check('city','city_error','Invalid city name');"></td>
            </tr>
            <tr id="city_error">
            </tr>
            <tr>
            	<td class="label">Contact no :</td>
                <td><input name="contact" id="contact" type="text" onBlur="number_check('contact','contact_error','Invalid Number');"  placeholder="10-digit number"></td>
            </tr>
            <tr id="contact_error">
            </tr>
            <tr>
            	<td class="label">Institution :</td>
                <td><input name="institution" id="inst" type="text" onBlur="inst_check('inst','inst_error','Invalid institution name');"></td>
            </tr>
            <tr id="inst_error">
            </tr>
            <tr>
            	<td></td>
                <td><div class="terms">By continuing you agree that you have read<br>and accept all <a href="rules.php"><span>rules and regulations</span></a></div><input type="submit" class="button" name="register" value="Register"></td>
            </tr>

        </table>
        
        
    </form>
	</center>   
   </div></center>
    <?php
	}
	?>
</body>
</html>