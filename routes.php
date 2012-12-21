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

// $app->post('/signup', function() {
// 	$type = $_POST['type'];

// 	if ($type == 'email') {
// 		echo 'email';
// 	} else if ($type == 'facebook') {
// 		echo 'facebook';
// 	} else if ($type == 'twitter') {
// 		echo 'twitter';
// 	} else {
// 		echo 'not a valid type';
// 	}
// });


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


// - - - - - - - - - - - - - - - - - - - -
// TRUCK LIST --> OK
// - - - - - - - - - - - - - - - - - - - -
$app->post('/trucks', function() {
	$trucks = ORM::for_table('trucks')
				->raw_query("SELECT * FROM trucks LEFT JOIN truck_details ON trucks.id = truck_details.truck_id")
				->find_many();
	echo XML::create_trucks($trucks);
});


// - - - - - - - - - - - - - - - - - - - -
// TRUCK DETAILS --> OK
// TODO: Need to refactor using raw query
// - - - - - - - - - - - - - - - - - - - -
$app->post('/truck_details', function() {
	$truck_id = $_POST['truck_id'];
	$results = ORM::for_table('trucks')->find_one($truck_id);
	echo XML::create($results);
});


// - - - - - - - - - - - - - - - - - - - -
// NEARME --> OK
// get trucks depending on latitude, 
// longitude, and max_distance
// - - - - - - - - - - - - - - - - - - - -
$app->post('/nearme', function () {
	$lat = $_POST['latitude'];
	$lon = $_POST['longitude'];
	$max_dis = $_POST['max_distance'];

	$formula = "sqrt( pow(abs(longitude - $lon),2) * pow(abs(latitude - $lat),2) )";

	$trucks = ORM::for_table('trucks')->raw_query(
			"SELECT * FROM trucks WHERE $max_dis >= $formula"
		)->find_many();

	echo XML::create_trucks($trucks);
});


// - - - - - - - - - - - - - - - - - - - -
// TRUCK SEARCH --> OK
// - - - - - - - - - - - - - - - - - - - -
$app->post('/search', function () {

	$keyword = $_POST['keyword'];

	$trucks = ORM::for_table('trucks')
				->raw_query("SELECT * FROM trucks LEFT JOIN truck_details ON trucks.id = truck_details.truck_id WHERE trucks.name LIKE \"%$keyword%\" OR trucks.category LIKE \"%$keyword%\" OR truck_details.about LIKE \"%$keyword%\"")
				->find_many();

	echo XML::create_trucks($trucks);
});


//-------------
// start app
//-------------
$app->run();

