<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/Database.php';
include_once '../objects/GamePlanet.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$gamePlanet = new GamePlanet($db);
 
// get keywords
$keywords=isset($_GET["search"]) ? $_GET["search"] : "";
 
// query products
$stmt = $gamePlanet->search($keywords);
$num = $stmt->rowCount();
if($num>0){
    // Gameplanet product arrays
    $products_arr = array();
    $products_arr["records"] = array();

    // Retrieve content from GamePlanetdb
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
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
        array_push($products_arr["records"],$product_item);
    }
    // Response code OK
    http_response_code(200);
    // Reply message
    echo json_encode($products_arr);
}
else {
    // Response code NOT FOUND
    http_response_code(404);
    // Reply message
    echo json_encode(array("message"=>"No products found!"));
}


?>