<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once('../config/Database.php');
include_once('../objects/GamePlanet.php');

// Establish Database Connection
$database = new Database();
$db = $database->getConnection();

// Instantiate gamePlanet object
$gamePlanet = new GamePlanet($db);

// Get ID of product to be edited
$data = json_decode(file_get_contents("php://input"));

// Set ID property of product to be edited
$gamePlanet->id = $data->id;

// Set gamePlanet property values
$gamePlanet->name = $data->name;
$gamePlanet->price_per_unit = $data->price_per_unit;
$gamePlanet->developer = $data->developer;
$gamePlanet->publisher = $data->publisher;
$gamePlanet->platform = $data->platform;
$gamePlanet->pegi = $data->pegi;
$gamePlanet->ean = $data->ean;
$gamePlanet->stock = $data->stock;
$gamePlanet->description = $data->description;

if($gamePlanet->update()){
    // Response code OK
    http_response_code(200);
    // Reply message
    echo json_encode(array("message"=>"Product updated!"));
} else {
// Response code UNAVAILABLE
http_response_code(503);
// Reply message
echo json_encode(array("message"=> "Unable to update product!"));
}
// API BODY RAW INPUT
// {
//     "id" : "???",
//     "name" : "Jasper's Crazy Adventures",
//     "price_per_unit" : "59",
//     "publisher" : "Dysfunctional Analyzers!",
//     "developer" : "Hobo's In Space!",
//     "platform" : "PC",
//     "pegi" : "18",
//     "ean" : "0000000000000",
//     "stock" : "5",
//     "description" : "Go on a crazy adventure with Jasper the Jack of All Spades! Beat the crazy Klingon Adel, and his superiors, Captain Nijst, Confuzing Janzo, and Supreme Leader Reinaert!"
// }
?>
