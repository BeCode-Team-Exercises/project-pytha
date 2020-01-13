<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
include_once '../config/Database.php';
include_once '../objects/GamePlanet.php';

// instantiate db connection and gameplanet object
$database = new Database();
$db = $database->getConnection();

// initialize GamePlanet object
$gamePlanet = new GamePlanet($db);

// query products
$stmt = $gamePlanet->read();
$num = $stmt->rowCount();

// check if not empty
if ($num > 0) {

    //products array
    $products_arr = array();
    $products_arr['records'] = array();

    //retrieve our contents
    //fetch() is faster than fetchAll() !!!!!!
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $product_item = array(
            'name' => $name,
            'id' => $id,
            'price_per_unit' => $price_per_unit,
            'basic_unit' => $basic_unit,
            'tax_percentage' => $tax_percentage,
            'developer' => $developer,
            'publisher' => $publisher,
            'platform' => $platform,
            'pegi' => $pegi,
            'ean' => $ean,
            'stock' => $stock,
            'description' => $description
        );
        array_push($products_arr['records'], $product_item);
    }
    //Response code 200!
    http_response_code(200);
    echo json_encode($products_arr);
} else{
    //Response code 404!
    http_response_code(404);
    // Tell the user nothing found
    echo json_encode(
        array("message"=> "No products found!")
    );

}
