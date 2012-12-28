<?php

$app = new \Slim\Slim();

$app->config('templates.path', 'app/views');


$app->get('/', function() {
	echo 'Pdler Web App';
});

$app->get('/login', function() use ($app) {
   $app->render('login.php');
});

$app->get('/signup', function() use ($app) {
	$app->render(
      'signup.php',
      array('title' => 'Signup Page'));
});

$app->post('/signup', function() {
	$user = new UserController();
	$user->signup();
});

$app->post('/truck_details', function() {
   $truck = new TruckController();
   $truck->getTruckDetails();
});

$app->post('/trucks', function() {
   $trucks = new TruckController();
   $trucks->getAllTrucks();
});

$app->post('/nearme', function () {
   $tc = new TruckController();
   $tc->getAllTrucksNearMe();
});

$app->post('/search', function () {
	$tc = new TruckController();
   $tc->getAllTrucksByKeyword();
});

$app->run();