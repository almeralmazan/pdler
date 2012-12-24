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
   public static function listAllTrucks()
   {
      $query = "SELECT * " .
               "FROM trucks " .
               "LEFT JOIN truck_details " .
               "ON trucks.id = truck_details.truck_id";

      $trucks = ORM::for_table('trucks')
         ->raw_query($query)
         ->find_many();

      echo XmlHelper::create_trucks($trucks);
   }

   public static function viewTruckDetailsByTruckId()
   {
      $truck_id = $_POST['truck_id'];
      $results = ORM::for_table('trucks')->find_one($truck_id);
      echo XmlHelper::create($results);
   }
}
