<?php

class UserController
{

	public function __construct()
	{

	}

	public function signup()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = array();

		if ($this->validate_signup($username, $email, $errors)) {
			$this->render_signup_error($errors);
		} else {
			$this->insert($username, $email, $password);
			$this->render_signup_success();
		}
	}


	public function validate_signup($username, $email, &$errors)
	{
		$error_count = 0;

		$users = ORM::for_table('users')
			->raw_query("SELECT username FROM users WHERE username = '$username'")
			->find_many();

		if (count($users) >= 1) {
			$error_count++;
			$errors["username"] = "username already exists.";
		}

		$users = ORM::for_table('users')
				->raw_query("SELECT email FROM users WHERE email = '$email'")
				->find_many();

		if (count($users) >= 1) {
			$error_count++;
			$errors["email"] = "email already exists.";
		}

		if ($error_count >= 1) {
			return true;
		}

		return false;
	}


	private function insert($username, $email, $password)
	{
		$user = ORM::for_table('users')->create();
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;
		$user->created_at = date("Y-m-d H:i:s");
		$user->updated_at = "0000-00-00 00:00:00";
		$user->save();
	}

	private function render_signup_error($errors)
	{
		 $xml = XML::create_header();
		 $xml .= "<signup success=\"false\">\n";
		 $xml .= XML::create_error_messages($errors);
		 $xml .= "\n</signup>";
		 echo $xml;
	}

	private function render_signup_success()
	{
		$xml = XML::create_header();
		$xml .= "<signup success=\"true\"/>";
		echo $xml;
	}


}

?>