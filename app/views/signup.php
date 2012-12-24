<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/style.css">
	<script src="public/js/protos.js"></script>
	<script type="text/javascript">
		var request;

		function validateAndSend() {
			var p = retrieveFieldsValue();
			if ( isValid(p) ) { sendRequest(p); }
		}

		function isValid( params ) {
			return true;
		}

		function retrieveFieldsValue() {
			var p = {
				username : document.getElementById('username').value,
				email : document.getElementById('email').value,
				reemail : document.getElementById('re-email').value,
				password : document.getElementById('password').value,
				repassword : document.getElementById('re-password').value
			};

			return p;
		}

		function sendRequest(params) {
			request = new protos.net.NetRequest();
			request.bind("complete",  null , requestComplete );
			request.load("http://dev.pdler.com/signup", "POST", params );
		}

		function requestComplete(e) { 
			console.log(request.data); 
		}
	</script>
	<title><?php echo $title ?></title>
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
			        	<input class="btn btn-large btn-success btn-block" type="button" onclick="validateAndSend()" value="Submit"/>
			   	</form>
			</div>
		</div>
	</div>
</body>
</html>