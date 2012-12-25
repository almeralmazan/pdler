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
      $longitude = $_POST['longitude'];
      $latitude = $_POST['latitude'];
      $max_distance = $_POST['max_distance'];

      $trucks = TruckModel::geoLocation($longitude, $latitude, $max_distance);
      XmlHelper::viewAll($trucks);
   }

   public function getAllTrucksByKeyword()
   {
      $keyword = $_POST['keyword'];
      $trucks = TruckModel::selectAllTrucksByKeyword($keyword);
      XmlHelper::viewAll($trucks);
   }

   public function getTruckDetails()
   {
      $truck_id = $_POST['truck_id'];
      $truck = TruckModel::listTruckDetails($truck_id);
      XmlHelper::viewTruckDetails($truck);
   }

   public function getAllTrucks()
   {
      $trucks = TruckModel::selectAllTrucks();
      XmlHelper::viewAll($trucks);
   }
}
