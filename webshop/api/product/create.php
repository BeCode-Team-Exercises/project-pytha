<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once("../config/Database.php");
include_once("../objects/GamePlanet.php");

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
    !empty($data->tax_percentage)&&
    !empty($data->developer)&&
    !empty($data->publisher)&&
    !empty($data->platform)&&
    !empty($data->pegi)&&
    !empty($data->ean)&&
    !empty($data->stock)&&
    !empty($data->description)
){
    $product->name = $data->name;
    $product->price_per_unit = $data->price_per_unit;
    $product->tax_percentage = $data->tax_percentage;
    $product->developer = $data->developer;
    $product->publisher = $data->publisher;
    $product->platform = $data->platform;
    $product->pegi = $data->pegi;
    $product->ean = $data->ean;
    $product->stock = $data->stock;
    $product->description = $data->description;

    if($product->create()){
        // Response code CREATED
      http_response_code(201);
        // Reply message
        echo json_encode(array("message"=>"Product was created!"));
    }else{
        // Response code Service unavailable
        http_response_code(503);
        // Reply message
        echo json_encode(array("Unable to create product."));
    }
}