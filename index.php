<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Include all libraries
// - - - - - - - - - - - - - - - - - - - - - - - - - - - -
require 'vendor/autoload.php';
require 'vendor/xml/xml.php';
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