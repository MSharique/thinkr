<?php require_once('session.php');
require_once('config.php');  ?>
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
//JS
function validateName(){
      // Validation rule
      var re = /[A-Za-z .]$/;
      // Check input
      if(re.test(document.getElementById('name').value)){
        // Style green
        document.getElementById('name').style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById('name' + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('name').style.background ='#e35152';
        // Show error prompt
        document.getElementById('name' + 'Error').style.display = "block";
        return false; 
      }
    }
//validate state
function validateState(){
      // Validation rule
      var re = /[A-Za-z -']$/;
      // Check input
      if(re.test(document.getElementById('state').value)){
        // Style green
        document.getElementById('state').style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById('stateError').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('state').style.background ='#e35152';
        // Show error prompt
        document.getElementById('stateError').style.display = "block";
        return false; 
      }
    }
//validate city
function validateCity(){
      // Validation rule
      var re = /[A-Za-z -']$/;
      // Check input
      if(re.test(document.getElementById('city').value)){
        // Style green
        document.getElementById('city').style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById('city' + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('city').style.background ='#e35152';
        // Show error prompt
        document.getElementById('city' + 'Error').style.display = "block";
        return false; 
      }
    }
//validate institution
function validateInst(){
      // Validation rule
      var re = /[A-Za-z -']$/;
      // Check input
      if(re.test(document.getElementById('institution').value)){
        // Style green
        document.getElementById('institution').style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById('inst' + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('institution').style.background ='#e35152';
        // Show error prompt
        document.getElementById('inst' + 'Error').style.display = "block";
        return false; 
      }
    }

// Validate email
    function validateEmail(){ 
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(re.test(document.getElementById('email').value)){
        document.getElementById('email').style.background ='#ccffcc';
        document.getElementById('emailError').style.display = "none";
        return true;
      }else{
        document.getElementById('email').style.background ='#e35152';
		document.getElementById('emailError').style.display = "block";
        return false;
      }
    }
	
//validate radio
function validateRadio(x){
      if(document.getElementById(x).checked){
        return true;
      }else{
        return false;
      }
    }

//phonenummmmmmmmmmmmmmmmmmmmmmmmmmmmmmm
	function PhoneValidation()
      {   
	  var reg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
      
        var OK = reg.exec(document.getElementById('contact').value);  
        if (!OK)  
		{
        //  window.alert("phone number isn't  valid");  
		  document.getElementById('contact').style.background ='#e35152';
		  document.getElementById('contactError').style.display = "block";
          return false;
		  }
        else  
		{
          //window.alert("phone number is  valid");  
		  document.getElementById('contact').style.background ='#ccffcc';
        document.getElementById('contactError').style.display = "none";
        
		  return true;
			}
	  }
	  
	//validate date , if null
	function validateDate(){
      // Check input
	  var str = document.getElementById('Date_of_birth').value; 
      if(str.length != 0){
        // Style green
        document.getElementById('Date_of_birth').style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById('dateError').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('Date_of_birth').style.background ='#e35152';
        // Show error prompt
        document.getElementById('dateError').style.display = "block";
        return false; 
      }
    }
//form validation	  
function validateForm(){
//window.alert("I'm activating!");
      // Set error catcher
      var error = 0;
//window.alert("Initialisation done");
      // Check name
      if(!validateName()){
        document.getElementById('nameError').style.display = "block";
        error++;
      }
//window.alert("After name");
      // Validate email
      if(!validateEmail()){
        document.getElementById('emailError').style.display = "block";
        error++;
      }
//window.alert("After email");
      // Validate Radio
      if(validateRadio('Gender_0')){
 
      }else if(validateRadio('Gender_1')){
         
      }else{
        document.getElementById('GenderError').style.display = "block";
        error++;
      }
//window.alert("After radio");
      // Check state
      if(!validateState()){
        document.getElementById('stateError').style.display = "block";
        error++;
      }
//window.alert("After state");
      // Check city
      if(!validateCity()){
	    //document.getElementById('city').style.background ='#D7CE22';
        document.getElementById('cityError').style.display = "block";
        error++;
      }
//window.alert("After city");
	// Check inst
      if(!validateInst()){
        document.getElementById('instError').style.display = "block";
        error++;
      }
//window.alert("After inst");
	// Check date
      if(!validateDate()){
	//	window.alert("within date");
		document.getElementById('dateError').style.display = "block";
        error++;
      }
	  
	  //validate contact number
	  if(!PhoneValidation()){
        document.getElementById('contactError').style.display = "block";
        error++;
      }
	  
//window.alert("After date");		
	  // Don't submit form if there are errors
	  //alert(document.write (error));
	//  window.alert("error = ");
      if(error > 0){
	  /*message = "x is equal to ";
document.write (message); // prints the value of the message variable
        */
		
		return false;
      }
    }     
 
</script>
<body>
    
    <?php include("header1.php"); ?>
 <?php 


/* connect to database using mysqli */
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
//	Print_r ($_SESSION);
	echo "userid = ".$_SESSION["user_id"];
	$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id='".$_SESSION['user_id']."'"); 
	$var = mysqli_fetch_array($result);
	$user_name = $var['name'];
	echo " user_name = $user_name";
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
<div id="registerBoard">
   		
   <span><br>My profile</center>
   <div style="border-bottom:2px solid #FFF; width:auto; margin-top:12px;"></div>
        <center>
	<form id="form1" name="form1" method="post" action="userinfo.php" onSubmit="return validateForm()">
    	<table>
        	<tr>
            	<td class="label">Full Name :</td>
                <td><input name="name" id="name" type="text"  onblur="validateName()" value="<?php echo $user_name ?> "><br>
				<span id="nameError" style="display: none;"><font color="red" size="2.25">&nbsp;Use only alphabetic characters</font></span><td>
            	<input name="unique" type="hidden" value="<?php echo $id_r ?>" />
			</tr>
            <tr>
            	<td class="label">Gender :</td>
                <td>
                	<input type="radio" class="genderRadio" name="Gender" value="Male" id="Gender_0" <?php if($gender == 'Male') echo 'checked="checked"'; ?> onBlur="validateRadio(id)">
                    <label>Male</label>
            
                    <input type="radio" class="genderRadio" name="Gender" value="Female" id="Gender_1"<?php if($gender == 'Female') echo 'checked="checked"'; ?> onBlur="validateRadio(id)">
                    Female
                </td>
            	<td><span class="validateError" id="GenderError" style="display: none;"><font color="red" size="2.25">Specify your gender</font></span><td>
            </tr>
            <tr>
            	<td class="label">Date of birth :</td>
                <td><input id="Date_of_birth" name="Date_of_birth" type="date" value="<?php echo $dob?>" onblur="validateDate()"value="" placeholder="dd/mm/yyyy" /></td>
				<td><span id="dateError" style="display: none;"><font color="red" size="2.25">Plz select Date</font></span><td>
			</tr>
            <tr>
            	<td class="label">Email ID :</td>
                <td><input name="email" type="email" id="email" onBlur="validateEmail()" value="<?php echo $email; ?>" placeholder="user@domain.com"></td>
				 <td><span id="emailError" style="display: none;"><font color="red" size="2.25">Invalid email</font></span><td>
			</tr>
            <tr>
            	<td class="label">State :</td>
                <td><input name="state" id="state" type="text" onBlur="validateState()" value="<?php echo $state; ?>"></td>
				<td><span id="stateError" style="display: none;"><font color="red" size="2.25">Use only alphabetic characters, hyphens</font></span><td>
			</tr>
            <tr>
            	<td class="label">City :</td>
                <td><input name="city" id="city" value="<?php echo $city;?>" type="text" onBlur="validateCity()"></td>
				<td><span id="cityError" style="display: none;"><font color="red" size="2.26">Use only alphabetic characters, hyphens</font></span><td>
            </tr>
            <tr>
            	<td class="label">Contact no :</td>
				<td><input name="contact" id="contact" onBlur="PhoneValidation();" value="<?php echo $cntct_no ?>" type="text" placeholder="10-digit number"><br>
				<span id="contactError" style="display: none;"><font color="red" size="2.25" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid Number</font></span><td>
			</tr>
            <tr>
            	<td class="label">Institution :</td>
                <td><input name="institution" id="institution"  onblur="validateInst()" value="<?php echo $inst?>" type="text"></td>
				<td><span id="instError" style="display: none;"><font color="red" size="2.25">alphabets only</font></span><td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" class="button" name="register" value="Save Changes"></td>
            </tr>

        </table>
        
        
    </form></center>
	</div>
   <div class="" id=""></div>
   
   </div>
    
</body>
