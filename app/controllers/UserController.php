<?php

class UserController
{
	public function __construct(){}

	public function signup()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = array();

		if ($this->validate_signup($username, $email, $errors)) {
			XmlViewHelper::render_signup_error($errors);
		} else {
			UserModel::insert($username, $email, $password);
			XmlViewHelper::render_signup_success();
		}
	}

	private function validate_signup($username, $email, &$errors)
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

}
