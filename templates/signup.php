<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/style.css">
	<script src="../public/js/jquery.js"></script>
	<script src="../public/js/script.js"></script>
	<title>Signup Page</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span4 offset4 well">
			  	<legend>Sign up!</legend>
					<form accept-charset="UTF-8" action="" method="post">
						<input id="username" class="span4" name="username" placeholder="Pick a username" type="text" autofocus> 
			        	<input id="email" class="span4" name="email" placeholder="Your email" type="email">
			        	<input id="re-email" class="span4" name="re-email" placeholder="Retype your email" type="text">
			        	<input id="password" class="span4" name="password" placeholder="Create a password" type="password"> 
			        	<input id="re-password" class="span4" name="re-password" placeholder="Retype your password" type="password"> 
			        	<button class="btn btn-large btn-success btn-block" type="submit">Submit</button>
			   	</form>
			</div>
		</div>
	</div>
</body>
</html>