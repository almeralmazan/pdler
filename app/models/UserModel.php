<?php

class UserModel
{
   public static function find($username, $password)
   {
      return ORM::for_table('users')
               ->raw_query(
                  "SELECT username, password, email " .
                  "FROM users " .
                  "WHERE username = '$username' " .
                  "AND password = '". md5($password) . "'"
               )->find_many();
   }

   public static function selectUsername($username)
   {
      return ORM::for_table('users')
               ->raw_query(
                  "SELECT username " .
                  "FROM users " .
                  "WHERE username = '$username'"
               )->find_many();
   }

   public static function selectEmail($email)
   {
      return ORM::for_table('users')
               ->raw_query(
                  "SELECT email " .
                  "FROM users " .
                  "WHERE email = '$email'"
               )->find_many();
   }

   public static function insert($username, $email, $password)
   {
      $user = ORM::for_table('users')->create();
      $user->username = $username;
      $user->email = $email;
      $user->password = md5($password);
      $user->created_at = date("Y-m-d H:i:s");
      $user->updated_at = "0000-00-00 00:00:00";
      $user->save();
   }
}
