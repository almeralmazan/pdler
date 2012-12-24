<?php
/**
 * Created by JetBrains PhpStorm.
 * User: almerboy
 * Date: 12/24/12
 * Time: 11:22 AM
 * To change this template use File | Settings | File Templates.
 */
class UserModel
{
   public static function insert($username, $email, $password)
   {
      $user = ORM::for_table('users')->create();
      $user->username = $username;
      $user->email = $email;
      $user->password = $password;
      $user->created_at = date("Y-m-d H:i:s");
      $user->updated_at = "0000-00-00 00:00:00";
      $user->save();
   }
}
