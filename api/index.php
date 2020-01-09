<?php
$test = [
    "id" =>  'derp',
    "name" => 'yup',
    "description" => '$product->description',
    "price" => '$product->price',
    "category_id" => '$product->category_id',
    "category_name" => '$product->category_name'
];
// echo $test;
// var_dump($test);
// var_dump($_GET);
// if (array_key_exists('id', $_GET)) {
//     echo $_GET['id'];
//     $test['id'] = $_GET['id'];
//     $test['name'] = $_GET['name'];
//     $test['price'] = $_GET['price'];
//     var_dump($test);
// }

http_response_code(201);
echo json_encode(array("message" => $_GET['id'], "message1" => $_GET['name'], "message2" => $_GET['price'], "message3" => "Product was created.",));
