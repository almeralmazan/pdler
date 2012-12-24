<?php

$app = new \Slim\Slim();

$app->get('/', function() {
	echo 'Home page';
});

$app->get('/signup', function() use ($app) {
	$app->render(
      'signup.php',
      array('title' => 'Signup page goes here...')
   );
});

$app->post('/signup', function() {
	$user = new UserController();
	$user->signup();
});

$app->post('/trucks', function() {
   $trucks = TruckModel::selectAllTrucks();
   echo XmlViewHelper::listAllTrucks($trucks);
});

$app->post('/truck_details', function() {
	$truck_details = TruckModel::listTruckDetails();
   echo XmlViewHelper::create($truck_details);
});

$app->post('/nearme', function () {
	$lat = $_POST['latitude'];
	$lon = $_POST['longitude'];
	$max_dis = $_POST['max_distance'];

	$formula = "sqrt( pow(abs(longitude - $lon),2) * pow(abs(latitude - $lat),2) )";

	$trucks = ORM::for_table('trucks')->raw_query(
			"SELECT * FROM trucks WHERE $max_dis >= $formula"
		)->find_many();

	echo XmlViewHelper::create_trucks($trucks);
});

$app->post('/search', function () {

	$keyword = $_POST['keyword'];

	$trucks = ORM::for_table('trucks')
				->raw_query("SELECT * FROM trucks LEFT JOIN truck_details ON trucks.id = truck_details.truck_id WHERE trucks.name LIKE \"%$keyword%\" OR trucks.category LIKE \"%$keyword%\" OR truck_details.about LIKE \"%$keyword%\"")
				->find_many();

	echo XmlViewHelper::create_trucks($trucks);
});

$app->run();