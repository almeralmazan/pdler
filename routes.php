<?php

$app = new \Slim\Slim();

$app->get('/', function() {
	echo 'Home page';
});

$app->get('/signup', function() use ($app) {
	$app->render(
      'signup.php',
      array('title' => 'Signup Page')
   );
});

$app->post('/signup', function() {
	$user = new UserController();
	$user->signup();
});

$app->post('/truck_details', function() {
   $truck = TruckModel::list_truck_details();
   XmlHelper::view_truck_details_of_one($truck);
});

$app->post('/trucks', function() {
   $trucks = TruckModel::select_all_trucks();
   XmlHelper::view_all($trucks);
});

$app->post('/nearme', function () {
   $tc = new TruckController();
   $trucks = $tc->get_all_trucks_nearme();
	XmlHelper::view_all($trucks);
});

$app->post('/search', function () {
	$tc  = new TruckController();
   $trucks = $tc->search_all_trucks_by_keyword();
	XmlHelper::view_all($trucks);
});

$app->run();