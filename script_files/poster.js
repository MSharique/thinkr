function highlightIn(el)
{
	var elm = document.getElementById(el);
	elm.style.fontWeight = "bolder";
	elm.style.color = "#E10016";
}

function highlightOut(el)
{
	var elm = document.getElementById(el);
	elm.style.fontWeight = "normal";
	elm.style.color = "#000000";
}