<?php

class UserController
{
	public function signup()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = array();

		if ($this->validateSignup($username, $email, $errors))
      {
         XmlHelper::renderErrors("signup", $errors);
      }
      else
      {
         UserModel::insert($username, $email, $password);
			XmlHelper::renderSuccess("signup", "");
		}
	}

	public function login()
   {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $errors = array();

      $user = $this->isValidLogin($username, $password, $errors);

      if ($user != NULL) {
         XmlHelper::renderSuccess("login", XmlHelper::createUser($user));
      } else {
         XmlHelper::renderErrors("login", $errors);
      }
   }

	private function validateSignup($username, $email, &$errors)
	{
		$errorCount = 0;

		$users = UserModel::selectUsername($username);

		if (count($users) >= 1) {
			$errorCount++;
			$errors["username"] = "username already exists.";
		}

		$users = UserModel::selectEmail($email);

		if (count($users) >= 1) {
			$errorCount++;
			$errors["email"] = "email already exists.";
		}

		return ($errorCount >= 1);
	}

   private function isValidLogin($username, $password, &$errors)
   {
      $users = UserModel::find($username, $password);

      if (count($users) > 0) return $users[0];

      $errors["user_and_pass"] = "please check your username and password.";
      return NULL;
   }

}
