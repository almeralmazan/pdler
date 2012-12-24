<?php
/**
 * Created by JetBrains PhpStorm.
 * User: almerboy
 * Date: 12/24/12
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */
class TruckController
{
   public function __construct(){}

   public function getAllTrucksNearMe()
   {
      $latitude = $_POST['latitude'];
      $longitude = $_POST['longitude'];
      $max_distance = $_POST['max_distance'];

      $location = TruckModel::set_location($longitude, $latitude, $max_distance);

      return $location;
   }

   public function searchAllTrucksByKeyword()
   {
      $keyword = $_POST['keyword'];

      $trucks = TruckModel::select_all_trucks_by($keyword);

      return $trucks;
   }
}
