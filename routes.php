<?php

$app = new \Slim\Slim();

// - - - - - - - - - - - -
// HOME PAGE 
// - - - - - - - - - - - -
$app->get('/', function() {
	echo 'Home page';
});


// - - - - - - - - - - - -
// SIGNUP PAGE 
// - - - - - - - - - - - -
$app->get('/signup', function() use ($app) {
	$app->render('signup.php', array('title' => 'Signup page goes here...'));
});


// - - - - - - - - - - - -
// LOGIN PAGE
// - - - - - - - - - - - -
$app->get('/login', function() use ($app) {
	$app->render('/login.php');
});

$app->post('/login', function() {
	$username = $_POST['username'];
	$password = $_POST['password'];

	echo 'Username : ' . $username;
	echo '<br />';
	echo 'Password : ' . $password;
});


// - - - - - - - - - - - - - 
// TRUCK DETAILS
// - - - - - - - - - - - - - 
$app->post('/truck_details', function() {
	$truck_id = $_POST['truck_id'];

	$results = ORM::for_table('trucks')
				->join('truck_details', 'trucks.id = truck_details.truck_id')
				->find_one($truck_id);

	echo XML::create_truck($results);
});


// list of all trucks
// pdslim.dev/trucks
// $app->get('/trucks', function () {
// 	echo XML::create( ORM::for_table('trucks')->find_many() );
// });


// get specific truck by id
// pdslim.dev/trucks/1
// $app->get('/trucks/:id', function ($id) {
// 	$truck = ORM::for_table('trucks')->find_one($id);
// 	echo (! $truck) ? "No truck available" : XML::create($truck);
// });


// get trucks depending on latitude, longitude, and max_distance
$app->post('/nearme', function () {
	$lat = $_POST['latitude'];
	$lon = $_POST['longitude'];
	$max_dis = $_POST['max_distance'];

	$formula = "sqrt( pow(abs(longitude - $lon),2) * pow(abs(latitude - $lat),2) )";

	$trucks = ORM::for_table('trucks')->raw_query(
			"SELECT * FROM trucks WHERE $max_dis >= $formula"
		)->find_many();

	echo XML::create($trucks);
});


// search by name 
// pdslim.dev/search-by-name/kfc
// $app->get('/search-by-name/:name', function ($name) {
// 	$trucks = ORM::for_table('trucks')
// 		->where_like('name', '%'.$name.'%')->find_many();
// 	echo (! $trucks) ? "not found" : XML::create($trucks);
// });


// search by description
// pdslim.dev/search-by-desc/amer
// $app->get('/search-by-desc/:desc', function ($desc) {
// 	$trucks = ORM::for_table('trucks')
// 		->where_like('description', '%'.$desc.'%')
// 		->find_many();
// 	echo (! $trucks) ? "not found" : XML::create($trucks);
// });


// search by category
// pdslim.dev/search-by-category/chinese
// $app->get('/search-by-category/:category', function ($category) {
// 	$trucks = ORM::for_table('trucks')
// 		->where_like('category', '%'.$category.'%')
// 		->find_many();
// 	echo (! $trucks) ? "not found" : XML::create($trucks);
// });


//-------------
// start app
//-------------
$app->run();

