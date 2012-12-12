<?php
require 'vendor/autoload.php';
require 'vendor/xml/xml.php';
require_once 'vendor/idiorm/idiorm.php';

ORM::configure('mysql:host=localhost;dbname=pdler_db');
ORM::configure('username', 'root');
ORM::configure('password', 'password');

// create slim object
$app = new \Slim\Slim();


// home page
// pdslim.dev/trucks
$app->get('/trucks', function ()
{
	echo XML::create( ORM::for_table('trucks')->find_many() );
});


// get specific truck by id
// pdslim.dev/trucks/1
$app->get('/trucks/:id', function ($id)
{
	$truck = ORM::for_table('trucks')->find_one($id);
	echo (! $truck) ? "No truck available" : XML::create($truck);
});


// get trucks depending on latitude, longitude, and max_distance
// pdslim.dev/trucks/lon/0/lat/0/max_dis/16
$app->get('/trucks/lon/:lon/lat/:lat/max_dis/:max_dis', 
function ($lon, $lat, $max_dis) 
{
	$formula = "sqrt( pow(abs(longitude-$lon),2) * pow(abs(latitude-$lat),2) )";

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


// search by category
// pdslim.dev/search-by-category/
$app->get('/search-by-category/:category', function ($category)
{
	$trucks = ORM::for_table('trucks')
		->where_like('category', '%'.$category.'%')->find_many();
	echo (! $trucks) ? "not found" : XML::create($trucks);
});


//-------------
// start app
$app->run();

