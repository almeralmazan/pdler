<?php
/**
 * Created by JetBrains PhpStorm.
 * User: almerboy
 * Date: 12/24/12
 * Time: 2:49 PM
 * To change this template use File | Settings | File Templates.
 */
class TruckModel
{
   public static function select_all_trucks()
   {
      $query = "SELECT * " .
               "FROM trucks " .
               "LEFT JOIN truck_details " .
               "ON trucks.id = truck_details.truck_id";

      $result = ORM::for_table('trucks')->raw_query($query)->find_many();

      return $result;
   }

   public static function list_truck_details()
   {
      $truck_id = $_POST['truck_id'];
      $result = ORM::for_table('trucks')->find_one($truck_id);
      return $result;
   }

   public static function set_location($longitude, $latitude, $max_distance)
   {
      $formula = "sqrt( pow(abs(longitude - $longitude),2) * pow(abs(latitude - $latitude),2) )";
      $query = "SELECT * FROM trucks WHERE $max_distance >= $formula";
      $result = ORM::for_table('trucks')->raw_query($query)->find_many();
      return $result;
   }

   public static function select_all_trucks_by($keyword)
   {
      $query = "SELECT * " .
               "FROM trucks " .
               "LEFT JOIN truck_details " .
               "ON trucks.id = truck_details.truck_id " .
               "WHERE trucks.name LIKE '%$keyword%' ".
               "OR trucks.category LIKE '%$keyword%' ".
               "OR truck_details.about LIKE '%$keyword%'";

      $result = ORM::for_table('trucks')->raw_query($query)->find_many();
      return $result;
   }
}
