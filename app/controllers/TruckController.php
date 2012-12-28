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
      $long = $_POST['longitude'];
      $lat = $_POST['latitude'];
      $max_dist = $_POST['max_distance'];

      $trucks = TruckModel::searchForLocation($long, $lat, $max_dist);
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
