<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once "../config/Database.php";
include_once "../objects/GamePlanet.php";

// Establish database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate GamePlanet
$gamePlanet = new GamePlanet($db);

// Get POSTED data
$data = json_decode(file_get_contents("php://input"));

// Check if data is empty
if(
    !empty($data->name)&&
    !empty($data->price_per_unit)&&
    !empty($data->developer)&&
    !empty($data->publisher)&&
    !empty($data->platform)&&
    !empty($data->pegi)&&
    !empty($data->ean)&&
    !empty($data->stock)&&
    !empty($data->description)
){
    $gamePlanet->name = $data->name;
    $gamePlanet->price_per_unit = $data->price_per_unit;
    $gamePlanet->developer = $data->developer;
    $gamePlanet->publisher = $data->publisher;
    $gamePlanet->platform = $data->platform;
    $gamePlanet->pegi = $data->pegi;
    $gamePlanet->ean = $data->ean;
    $gamePlanet->stock = $data->stock;
    $gamePlanet->description = $data->description;

    if($gamePlanet->create()){
        // Response code CREATED
      http_response_code(201);
        // Reply message
        echo json_encode(array("message"=>"Product was created!"));
    }else{
        // Response code SERVICE UNAVAILABLE
        http_response_code(503);
        // Reply message
        echo json_encode(array("message"=>"Unable to create product."));
    }
}

else{
    // Response code BAD REQUEST
    http_response_code(400);
    // Reply message
    echo json_encode(array("message"=>"Unable to create product. Data is incomplete!"));
}


// API BODY RAW INPUT
// {
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