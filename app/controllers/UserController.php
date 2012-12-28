<?php

class UserController
{
	public function signup()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = array();

		if ($this->validateSignup($username, $email, $errors)) {
			XmlHelper::renderErrors("signup", $errors);
		} else {
			UserModel::insert($username, $email, $password);
			XmlHelper::renderSuccess("signup", "");
		}
	}

   // TODO: Need to refactor
	private function validateSignup($username, $email, &$errors)
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

   // TODO: Need to refactor
   public function login()
   {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $errors = array();
      $user = $this->isValidLogin($username, $password , $errors ) ;
      if( $user != NULL ) {
         XmlHelper::renderSuccess("login", XmlHelper::createUser( $user ) );
      } else {
         XmlHelper::renderErrors("login", $errors);
      }
   }

   // TODO: Need to refactor
   private function isValidLogin( $username, $password , &$errors)
   {
      $sql = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
      $users =  ORM::for_table('users')->raw_query($sql)->find_many();
      $users_count = count( $users ) ;
      if( $users_count > 0 ) {
         return $users[0];
      }
      $errors["user_and_pass"] = "please check your username and password.";
      return NULL;
   }

}
