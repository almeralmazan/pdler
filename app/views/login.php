<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/style.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="public/css/bootstrap-responsive.css" rel="stylesheet">
	<title>Login Page</title>
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Pdler</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class=""><a href="/">Home</a></li>
              <li class="active"><a href="/login">Login</a></li>
              <li class=""><a href="/signup">Signup</a></li>
            </ul>


          </div><!--/.nav-collapse -->
        </div>
      </div>
   </div>

	<div id="the-form" class="container">
		<div class="row">
			<div class="span4 offset4 well">
				<legend>Login</legend>
				<form method="POST" action="" accept-charset="UTF-8">
					<input type="text" id="username" class="span4" name="username" placeholder="Username" autofocus>
					<input type="password" id="password" class="span4" name="password" placeholder="Password">
					<button type="submit" name="submit" class="btn btn-info btn-large btn-block">Login</button>
				</form>    
			</div>
		</div>

		<br/><br/><br/><br/><br/><br/>
		<hr>

		<footer>
	     <p>&copy; Company 2012</p>
	   </footer>

	</div>


</body>
</html>