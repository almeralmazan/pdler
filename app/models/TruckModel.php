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
   public static function selectAllTrucks()
   {
      $query = "SELECT * " .
               "FROM trucks " .
               "LEFT JOIN truck_details " .
               "ON trucks.id = truck_details.truck_id";

      return ORM::for_table('trucks')->raw_query($query)->find_many();
   }

   public static function listTruckDetails($truck_id)
   {
      return ORM::for_table('trucks')->find_one($truck_id);
   }

   public static function searchForLocation($longitude, $latitude, $max_distance)
   {
      $formula = "sqrt( pow(abs(longitude - $longitude),2) * pow(abs(latitude - $latitude),2) )";

      return ORM::for_table('trucks')
               ->raw_query(
                  "SELECT * " .
                  "FROM trucks " .
                  "WHERE $max_distance >= $formula"
               )->find_many();
   }

   public static function selectAllTrucksByKeyword($keyword)
   {
      return ORM::for_table('trucks')
               ->raw_query(
                  "SELECT * " .
                  "FROM trucks " .
                  "LEFT JOIN truck_details " .
                  "ON trucks.id = truck_details.truck_id " .
                  "WHERE trucks.name LIKE '%$keyword%' ".
                  "OR trucks.category LIKE '%$keyword%' ".
                  "OR truck_details.about LIKE '%$keyword%'"
               )->find_many();
   }
}
