<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once('../config/Database.php');
include_once('../objects/GamePlanet.php');

// Establish Database Connection
$database = new Database();
$db = $database->getConnection();

$gamePlanet = new GamePlanet($db);


