$(document).ready( function() {

	$('[type=submit]').click( function(event) {
		
		var username = $('#username').val();
		var email = $('#email').val();
		var reemail = $('#re-email').val();
		var password = $('#password').val();
		var repassword = $('#re-password').val();

		console.log('Username: ' + username);
		console.log('Email: ' + email);
		console.log('Re-Email: ' + reemail);
		console.log('Password: ' + password);
		console.log('Re-Password: ' + repassword);

		event.preventDefault();
	});

});