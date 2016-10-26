function setData(file,i)
{
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function(){
			
		if(xml.readyState==4 && xml.status==200)
		{
			document.getElementById("main").innerHTML = xml.responseText;
		}
	}
		
	xml.open("GET",file+"?idea="+i,true);
	xml.send();
}