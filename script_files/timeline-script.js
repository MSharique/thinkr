
function roundDetails(el)
{
	var elm = document.getElementById(el);
	elm.style.left = "0%";
	elm.style.transition = "all .7s linear";
}
	
function hideRoundDetails(el)
{
	var elm = document.getElementById(el);
	elm.style.left = "100%";
	elm.style.transition = "all .7s linear";
}
