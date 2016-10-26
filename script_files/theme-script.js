
function showDetails(el)
{
	var elm = document.getElementById(el);
	elm.style.right = "18%";
	elm.style.transition = "all .6s linear";
}

function hideDetails(el)
{
	var elm = document.getElementById(el);
	elm.style.right = "100%";
	elm.style.transition = "all .6s linear";
}