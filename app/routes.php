<?php
session_cache_limiter(false);
session_start();

$app = new \Slim\Slim();

$app->config('templates.path', 'app/views');


$app->get('/', function() use ($app) {
  $app->render('home.php');
});

$app->get('/login', function() use ($app) {
  $app->render('login.php');
});

$app->post('/login', function() {
  $user = new UserController();
  $user->login();
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

$app->post('/trucks', function() {
  $trucks = TruckModel::selectAllTrucks();
  XmlHelper::viewAll($trucks);
});

$app->post('/truck_details', function() {
  $truck_id = $_POST['truck_id'];
  $truck = TruckModel::listTruckDetails($truck_id);
  XmlHelper::viewTruckDetails($truck);
});

$app->post('/nearme', function () {
  $long = $_POST['longitude'];
  $lat = $_POST['latitude'];
  $max_dist = $_POST['max_distance'];

  $trucks = TruckModel::searchForLocation($long, $lat, $max_dist);
  XmlHelper::viewAll($trucks);
});

$app->post('/search', function () {
  $keyword = $_POST['keyword'];
  $trucks = TruckModel::selectAllTrucksByKeyword($keyword);
  XmlHelper::viewAll($trucks);
});

$app->run();