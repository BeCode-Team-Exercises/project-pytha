<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../config/Database.php");
include_once("../objects/GamePlanet.php");

// Establish database connection
$database = new Database();
$db = $database->getConnection();

// Instantiate GamePlanet object
$gamePlanet = new GamePlanet($db);

// set ID of property of record to read
$gamePlanet->id = isset($_GET['id']) ? $_GET['id'] : die();

// Read the details of gamePlanet object to be edited
$gamePlanet->readOne();

if($gamePlanet->name!=null){
    //create array
    $product_arr = array(
        'name' => $gamePlanet->name,
            'id' => $gamePlanet->id,
            'price_per_unit' =>  $gamePlanet->price_per_unit,
            'basic_unit' => $gamePlanet->basic_unit,
            'tax_percentage' => $gamePlanet->tax_percentage,
            'developer' => $gamePlanet->developer,
            'publisher' => $gamePlanet->publisher,
            'platform' => $gamePlanet->platform,
            'pegi' => $gamePlanet->pegi,
            'ean' => $gamePlanet->ean,
            'stock' => $gamePlanet->stock,
            'description' => $gamePlanet->description
    );
    // Response code Ok
    http_response_code(200);

    // Reply message
    echo json_encode($product_arr);
} else{
    // Response code Not found
    http_response_code(404);

    // Reply message
    echo json_encode(array("message"=>"Product does not exist!"));
}

?>