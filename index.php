<?php
require 'vendor/autoload.php';
require_once 'vendor/paris/idiorm.php';
require_once 'vendor/paris/paris.php';
require 'models/Truck.php';
require 'vendor/xml/xml.php';

ORM::configure('mysql:host=localhost;dbname=pdler_db');
ORM::configure('username', 'root');
ORM::configure('password', 'password');

// create slim object
$app = new \Slim\Slim();


// home page
// pdslim.dev/trucks
$app->get('/trucks', function()
{
	$trucks = Model::factory('Truck')->find_many();
	echo XML::create($trucks);
});


// get specific truck by id
// pdslim.dev/trucks/1
$app->get('/trucks/:id', function ($id)
{
	$truck = Model::factory('Truck')->find_one($id);
	echo (! $truck) ? "No truck available" : XML::create($truck);
});


// get trucks depending on latitude, longitude, and max_distance
// pdslim.dev/trucks/lon/0/lat/0/max_dis/16
$app->get('/trucks/lon/:lon/lat/:lat/max_dis/:max_dis', 
function ($lon, $lat, $max_dis) 
{
	$formula = "sqrt(pow(abs(longitude-$lon),2)*pow(abs(latitude-$lat),2))";

	$trucks = ORM::for_table('trucks')->raw_query(
			"SELECT * FROM trucks WHERE $max_dis >= $formula"
		)->find_many();

	echo XML::create($trucks);

});


// search by name 
$app->get('/search-by-name/:name', function ($name)
{
	$trucks = ORM::for_table('trucks')
		->where_like('name', '%'.$name.'%')->find_many();
	echo (! $trucks) ? "not found" : XML::create($trucks);
});


// search by description
// pdslim.dev/search-by-desc/amer
$app->get('/search-by-desc/:desc', function ($desc)
{
	$trucks = ORM::for_table('trucks')
		->where_like('description', '%'.$desc.'%')->find_many();
	echo (! $trucks) ? "not found" : XML::create($trucks);
});


//-------------
// start app
$app->run();

