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
		
		if(re.test(content))
		{
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
		if(re.test(content))
		{
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
		if(re.test(content))
		{
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
		if(!reg.exec(content))
		{
			getError(target,txt);
			return false;
			}
		else
		{
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
		if (temp) {
        	document.getElementById(target).innerHTML = "";
			return true;
        } 
        else
		{
			getError(target,txt);
			return false;
			}
    }
	
	//Validation for Institution Name
	function inst_check(self,target,txt)
	{
		var content = document.getElementById(self).value;
		
		if(content=="")
		{
			getError(target,txt);
			return false;
			}
		else
		{
			document.getElementById(target).innerHTML = "";
			return true;
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
	  ////window.alert("After date");		
	  // Don't submit form if there are errors
	  //alert(document.write (error));
	  
	//validate date
	  if(!check_date('Date_of_birth','date_of_birth_error','Invalid Date')){
        //document.getElementById('contactError').style.display = "block";
        error++;
      }
 // window.alert("error = ");
      if(error > 0){
	  /*message = "x is equal to ";
document.write (message); // prints the value of the message variable
        */
		
		return false;
      }
    }  