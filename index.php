<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Include all libraries
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
require 'vendor/autoload.php';
require 'app/helpers/XMLHelper.php';
require 'app/controllers/UserController.php';
require 'app/models/TruckModel.php';
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