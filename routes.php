<?php

$app = new \Slim\Slim();

$app->config('templates.path', 'app/views');


$app->get('/', function() {
	echo 'Pdler Web App';
});

$app->get('/signup', function() use ($app) {
	$app->render('signup.php', array('title' => 'Signup Page'));
});

$app->post('/signup', function() {
	$user = new UserController();
	$user->signup();
});

$app->post('/truck_details', function() {
   $truck = TruckModel::listTruckDetails();
   XmlHelper::viewTruckDetailsForOne($truck);
});

$app->post('/trucks', function() {
   $trucks = TruckModel::selectAllTrucks();
   XmlHelper::viewAll($trucks);
});

$app->post('/nearme', function () {
   $tc = new TruckController();
   $trucks = $tc->getAllTrucksNearMe();
	XmlHelper::viewAll($trucks);
});

$app->post('/search', function () {
	$tc  = new TruckController();
   $trucks = $tc->searchAllTrucksByKeyword();
	XmlHelper::viewAll($trucks);
});

$app->run();