<!DOCTYPE html>
<html>
<head>

<title>Thinkr</title>

<link href="design.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="thinkr_icon.ico">
<meta charset="UTF-8">
<meta name="thinkr" content="idea competition">
<meta name="ideathon" content="central India unique ideathon">
<meta name="competition" content="innovation event startups techfest fest battle">
<meta name="prize" content="win prize prizes">
<meta name="frame" content="webpage with multiple frames">
<meta name="iet" content="Institute of Engineering and Technology">
<meta name="DAVV" content="Devi Ahilya Vishwavidyalaya">
<meta name="incubation" content="iet incubation centre">
<meta name="about us" content="thinkr.ietincubation.com">
<meta name="facebook" content="login with Facebook">
<meta name="Google" content="login with google">
<meta name="implementation" content="we will implement for you for free">
<meta name="indore" content="first idea competition in indore ">
<meta name="poha" content="ideathon from students">
<meta name="entrepreneur" content="steps toward entrepreneurship">




<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>

<script>

	function animate(el1,el2,el3,el4,el5,el6,cnt)
	{
		var t = document.getElementById(el1);
		var h = document.getElementById(el2);
		var i = document.getElementById(el3);
		var n = document.getElementById(el4);
		var k = document.getElementById(el5);
		var r = document.getElementById(el6);
		var content = document.getElementById(cnt);
		
		t.style.left = "-4%";
		t.style.transition = "all 1.3s ease";
		
		r.style.right = "-5%";
		r.style.transition = "all 1.3s ease";
		
		h.style.top = "45%";
		h.style.transition = "all 1.3s ease";
		
		n.style.top = "45%";
		n.style.transition = "all 1.3s ease";
		
		i.style.bottom = "38%";
		i.style.transition = "all 1.3s ease";
		
		k.style.bottom = "38%";
		k.style.transition = "all 1.3s ease";
		
		content.style.width = "0%";
		content.style.transition = "all 4.2s ease";
	}
	
	var distance = 10; 
	var scrollY = 0;
	
	function scrollBox(el)
	{
		var currentY = window.pageYOffset;
		var targetY = document.getElementById(el).offsetTop;
		
		var animator = setTimeout('scrollBox(\''+el+'\')',4);
		
		
		if(currentY < targetY)
		{
			scrollY = currentY+distance;
			window.scroll(0,scrollY);
		}
		else
		{
			clearTimeout(animator);
		}
	}
	
	function scrollUp(el)
	{
		var currentY = window.pageYOffset;
		var targetY = document.getElementById(el).offsetTop;
		
		var animator = setTimeout('scrollUp(\''+el+'\')',0.1);
		
		
		if(currentY > targetY)
		{
			scrollY = currentY-distance;
			window.scroll(0,scrollY);
		}
		else
		{
			clearTimeout(animator);
		}
	}


	function setWidth(box)
	{
		var b = document.getElementById(box);
		var w = window.pageXOffset;
		b.style.minWidth = w;
	}	
	
	
	function showArrow(el1,el2)
	{
		var elm1 = document.getElementById(el1);
		elm1.style.visibility = "visible";
		
		var elm2 = document.getElementById(el2);
		elm2.style.visibility = "hidden";
	}
	
</script>

</head>
<body  onLoad="animate('t','h','i','n','k','r','contenthide'); showArrow('arrow1','loading')">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=279086025626247&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	
    <?php include("header.php"); ?>
    
    <section id="front_page">
    
    	<div id="login" onMouseOver="showLogin('login');" onMouseOut="hideLogin('login');"><a href="#"><img src="facebook icon.png" id="facebook" />
        </a> <a href="#"><img src="Gmail_icon.png" id="gmail"/></a></div>

		</div>
            <img src="thinker-t.png" id="t" >
            <img src="thinker-h.png" id="h">
            <img src="thinker-i.png" id="i">
            <img src="thinker-n.png" id="n">
            <img src="thinker-r.png" id="r">
			<img src="thinker-k.png" id="k">
        </div>


		<center><div id="loading">LOADING...</div></center>

		<div id="contenthide"></div><div id="content">All you need is a little imagination!</div>

		<img src="down.png" id="arrow1" onclick="scrollBox('f2_poster');" style="visibility:hidden;">

    </section>
    
    <div id="f2_poster">
    	<?php include("frame-2-poster.php"); ?>
    </div>
    
    <section id="f3_theme">
        <?php include("frame-3-theme.php"); ?>
	</section>
    
    <section id="f4_timeline">
        <?php include("frame-4-timeline.php"); ?>
    </section>
    
    <section id="footer">
    	
		<div id="thinkr">TH<span style="color:#f2e113;">!</span>NKR</div>
        <center><a href="#front_page"><div id="returnTop"><div class="fb-like" data-href="https://www.facebook.com/Thinkr4change" data-width="" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
    	Return to top</div></a>
		<div id="copyright">IET INCUBATION CENTER &copy; 2014</div></center>	
    	<div id="details">For any queries, contact<br>Ishan +918959165508<br>Divyesh +919009561632</div>
    </section>
    
</body>
</html>