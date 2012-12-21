$(document).ready( function() {

	$('[type=submit]').click( function(event) {
		
		var username = $('#username').val();
		var email = $('#email').val();
		var password = $('#password').val();

		console.log('Username: ' + username);
		console.log('Password: ' + password);
		console.log('Email: ' + email);

		event.preventDefault();
	});

});