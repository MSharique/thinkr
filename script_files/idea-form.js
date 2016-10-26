// JavaScript Document

	/* Ajax for Other Members' UserID Field*/
var user_1=false;
var user_2=false;
	function getData(divId,location)
	{
		var xml = new XMLHttpRequest();
		xml.onreadystatechange = function(){
					
			if(xml.readyState==4 && xml.status==200)
			{
				document.getElementById(divId).innerHTML = xml.responseText;
			}
		}
				
		xml.open("POST",location,true);
		xml.send();
	}
	
	function otherField(n)
	{	
		if(n.value == 2)
		{
			getData('others_1','others_1.php');
			document.getElementById("others_2").innerHTML = "";
		}
			
		else if(n.value == 3)
		{
			getData('others_1','others_1.php');
			getData('others_2','others_2.php');
		}
		
		else
		{
			document.getElementById("others_1").innerHTML = "";
			document.getElementById("others_2").innerHTML = "";
		}
	}
	
	/* Character limit function for IDEA SUMMARY */
	
	var maxLength=600;
	function charLimit(el)
	{
    	if (el.value.length > maxLength) 
			return false;
    
		return true;
	}
	
	function characterCount(el) 
	{
    	var charCount = document.getElementById('char_num');
    
		if (el.value.length > maxLength) 
			el.value = el.value.substring(0,maxLength);
    
		if (charCount) 
			charCount.innerHTML = maxLength - el.value.length;
    
		return true;
	}
	
	/* Selection of OTHER themes*/
	
	function enableOthers()
	{
		var check = document.getElementById("others").checked;
		
		if(check)
			document.getElementById("otherTheme").disabled = false;
			
		else
		{
			document.getElementById("otherTheme").value = "";
			document.getElementById("otherTheme").disabled = true;
		}
	}
	
	function getMemberError()
	{
		var xml = new XMLHttpRequest();
		xml.onreadystatechange = function(){
					
			if(xml.readyState==4 && xml.status==200)
			{
				document.getElementById("member_error").innerHTML = xml.responseText;
			}
		}
				
		xml.open("POST","member_error.php",true);
		xml.send();
	}
	
	function city_list(n,target,user)
	{
		var xml = new XMLHttpRequest();
		xml.onreadystatechange = function(){
			
			if(xml.readyState==4 && xml.status==200)
			{
				var temp = xml.responseText;
		//		window.alert("response temp = "+temp);
				if(temp == 0)
				{
					document.getElementById(target).innerHTML = "";
					if(user==1)
					{
			//			window.alert("first iddddddddd");
						user_1 = true;
						}
					else
					{
				//		window.alert("seccondd idddddddddd");
						user_2 = true;
						}
					return true;
				}		
				else
				{
					document.getElementById(target).innerHTML = "<td></td><td class=\"error\" id=\"contactError\"><span>Invalid UserID</span></td>";
					if(user==1)
					{
					//	window.alert("first iddddddddd");
						user_1 = false;
						}
					else
					{
						//window.alert("seccondd idddddddddd");
						user_2 = false;
						}
					return false;
				}
			}
		}
		
		xml.open("POST","check.php?index="+n,true);
		xml.send();
	}
	
	function validateTitle(self,target,txt)
	{
	  var content = document.getElementById(self).value 	
//		window.alert("val in self = "+content);
	  if(content=="")
	  {
        	getError(target,txt);
			return false;
      }
	  else{
        document.getElementById(target).innerHTML = "";
		return true; 
      }
    }
	
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
	
	function validateSelect()
	{
      	if(document.getElementById('no_of_members').selectedIndex != 0)
		{
			document.getElementById('no_members_error').innerHTML = "";
        	return true;
        }
		else
		{
			document.getElementById('no_members_error').innerHTML = "<td></td><td class=\"error\" id=\"contactError\"><span>Select atleast 1 contributor</span></td>";
        	return false;
      	}
    }



	function validateCheckbox()
	{
		var chks = document.getElementsByName('check_list[]');
		var hasChecked = false;
	
		for (var i = 0; i < chks.length; i++)
		{
			if (chks[i].checked)
			{
			hasChecked = true;
			break;
			}
		}
	
		if (hasChecked == false)
		{
			document.getElementById('check_error').innerHTML = "<td></td><td class=\"error\" id=\"contactError\"><span>Select atleast 1 category</span></td>";
			return false;
		}
	
		return true;
	}


function validateFormNew(){
      var error = 0;
     //window.alert("title = "+error);
      if(!validateTitle('title','title_error','Atleast one character is needed')){
        error++;
		
      }
	  //window.alert("title = "+error);
      // Validate dropdown box
      if(!validateSelect()){
        error++;
      }
      //window.alert("select = "+error);
      if(!validateCheckbox()){
        error++;
      }
      //window.alert("checkbox = "+error);
      if(document.getElementById('no_of_members').selectedIndex == 2)
	  {
		if(!user_1)error++;
		}
	  //window.alert("user1 = "+error);
      if(document.getElementById('no_of_members').selectedIndex == 3)
	  {
		if(!user_1)error++;
		// window.alert("between = "+error);
		if(!user_2)error++;
		}
	 //window.alert("user12 = "+error);
	  // Don't submit form if there are errors
      if(error > 0){
        return false;
      }
    }  
	
//validate draft form
function validateFormDraft(){
      var error = 0;
//window.alert("error = "+error);
      if(!validateTitle('title','title_error','Atleast one character is needed')){
        error++;
      }
//window.alert(error);
      if(!validateCheckbox()){
        error++;
      }
//window.alert("error = "+error);

	  // Don't submit form if there are errors
      if(error > 0){
        return false;
      }
    }
