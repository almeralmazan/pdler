<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Include all libraries
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
require_once 'vendor/autoload.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/TruckController.php';
require_once 'app/models/TruckModel.php';
require_once 'app/models/UserModel.php';
require_once 'app/helpers/XmlHelper.php';
require_once 'vendor/idiorm/idiorm.php';


// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Configure database
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
ORM::configure('mysql:host=localhost;dbname=pdler_db');
ORM::configure('username', 'root');
ORM::configure('password', 'password');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Include custom routes
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
include 'routes.php';