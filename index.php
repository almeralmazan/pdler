<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Include all libraries
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
require 'vendor/autoload.php';
require 'vendor/helper/xml.php';
require 'vendor/controllers/user_controller.php';
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