<!DOCTYPE html>
<html>
<head>
	<title>Pdler Signup</title>
	<meta charset="utf-8" />
	<meta name="Keywords" content="" />
	<meta name="Description" content="" />
	<!--required for page to scale properly inside any screen size, particularly in the mobile viewport-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
	
	<link rel="shortcut icon" href="" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
	<link rel="stylesheet" href="public/css/bootstrap.css" />
	<link rel="stylesheet" href="public/css/style2.css" />
	<link rel="stylesheet" href="public/css/responsive.css" />
</head>

<body style="background-color: #fefefe" class="clearfix">
<header>
	<nav class="clearfix">
		<h1 class="hide">Main Navigation</h1>
		<ul class="clearfix">
			<li><a href="index.html#home" data-target="home" data-offset="0">Home</a></li>
			<li><a href="index.html#features" data-target="features" data-offset="1">Features</a></li>
			<li><a href="index.html#download" data-target="download" data-offset="2">Download</a></li>
			<li><a href="index.html#powerpack" data-target="powerpack" data-offset="3">Powerpack</a></li>
			<li><a href="index.html#team" data-target="team" data-offset="4">Team</a></li>
		</ul>
		<a href="index.html#" id="pull">Menu</a>
		<div id="nav-pointer"></div>
	</nav>
</header>
<div class="slider"></div>
<div class="bgs">
	<div class="bg-1" data-type="main-bg"></div>
	<div class="bg-2" data-type="main-bg"></div>
	<div class="bg-3" data-type="main-bg"></div>
	<div class="bg-4" data-type="main-bg"></div>
</div>
<div class="parallax-cont clearfix">
	<section id="content-wrapper">
		<section class="content" id="home" data-type="bg" data-speed="2" offset="0">

			<!-- signup form -->
			<div id="the-form" class="container">
				<div class="row">
					<div class="span4 offset4 well">
					  	<legend>Sign up!</legend>
							<form accept-charset="UTF-8" action="" method="post">
								<input id="username" class="span4" name="username" placeholder="Pick a username" type="text" autofocus>
					        	<input id="email" class="span4" name="email" placeholder="Your email" type="email">
					        	<input id="re-email" class="span4" name="re-email" placeholder="Retype your email" type="text">
					        	<input id="password" class="span4" name="password" placeholder="Create a password" type="password">
					        	<input id="re-password" class="span4" name="re-password" placeholder="Retype your password" type="password">
					        	<input class="btn btn-large btn-success btn-block" type="button" onclick="validateAndSend()" value="Submit"/>
					   	</form>
					</div>
				</div>
			</div>

			<!-- <div class="fotofabpad" data-type="sprite" data-speed="4"></div> -->
			<table class="actions">
				<tr>
					<td><a href="index.html#" class="button">Download Pdler</a></td>
					<td><a href="index.html#" class="button">Powerpack</a></td>
				</tr>
				<tr class="row-sub-button">
					<td><a href="index.html#" class="sub-button">It's free</a></td>
					<td><a href="index.html#" class="sub-button">For a limited time only $3.99</a></td>
				</tr>
			</table>
			<!-- <footer>
				<div class="sub-info">
					<p>Take a photo with Fotofab on a custom background and share it with your friends!</p>
					<p>Take a photo with Fotofab on a custom background and share it with your friends!</p>
					<p>Take a photo with Fotofab on a custom background and share it with your friends!</p>
				</div>
			</footer> -->
		</section>
		<section class="content" id="features" data-type="bg" data-speed="2">
			<div class="content-full clearfix">
				<h1>Features</h1>
				<div class="fright" style="width: 500px;">
					<p>Lorem ipsum dolor sit amet, permiseras enim est cum obiectum ait. Tyrium coniugem flebant Tharsiam si mihi Tyrum reverteretur.</p>
					<p>Nullam mentiri habens nomine Piscatore mihi esse in rei sensibilium acciperem qui. Taliarchus eum est cum magna duobus consolabor potest meum tibi afferri magistrum.</p>
					<p>Quadragesimae tunc Tharsos princeps age sive proscripsit alia. Adora nuntiaveris non coepit contingere vasculo usque est Apollonius.</p>
					<p>Num praebeo deum voluntati eum ego esse deprecor possit scitis quas petierunt pervenit item ut a. Ergo accipiet domine filiae gloriam virginis instaret.</p>
				</div>
			</div>
		</section>
		<section class="content" id="download" data-type="bg" data-speed="2">
			<div class="content-full">
				<h1>Download</h1>
				<img src="public/images/construct.png" />
				<h4>Under Construction</h4>
			</div>
		</section>
		<section class="content" id="powerpack" data-type="bg" data-speed="2">
			<div class="content-full">
				<h1>Powerpack</h1>
				<img src="public/images/power.png" />
			</div>
		</section>
		<section class="content" id="team" data-type="bg" data-speed="2">
			<div class="content-full">
				<h1>Team</h1>
				<p>Lorem ipsum dolor sit amet, permiseras enim est cum obiectum ait. Tyrium coniugem flebant Tharsiam si mihi Tyrum reverteretur.</p>
				<p>Nullam mentiri habens nomine Piscatore mihi esse in rei sensibilium acciperem qui. Taliarchus eum est cum magna duobus consolabor potest meum tibi afferri magistrum.</p>
				<p>Quadragesimae tunc Tharsos princeps age sive proscripsit alia. Adora nuntiaveris non coepit contingere vasculo usque est Apollonius.</p>
				<p>Num praebeo deum voluntati eum ego esse deprecor possit scitis quas petierunt pervenit item ut a. Ergo accipiet domine filiae gloriam virginis instaret.</p>
			</div>
		</section>
	</section>
</div>
<footer id="footer">
	<p>Copyright &copy; 2012 pdler</p>
</footer>
	<script src="public/js/jquery.js"></script>
	<script src="public/js/jquery.easing.1.3.js"></script>
	<script src="public/js/script.js"></script>
</body>
</html>