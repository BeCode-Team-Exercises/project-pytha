<?php

include_once '../config/Database.php';



class GamePlanet
{
    // db connection and table name
    private $connection;
    private $table_name = "GamePlanetProducts";
    // properties
    public $name;
    public $id;
    public $price_per_unit;
    public $basic_unit;
    public $tax_percentage;
    public $developer;
    public $publisher;
    public $platform;
    public $pegi;
    public $ean;
    public $stock;
    public $description;
    //constructor with $db as connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    function read()
    {
        //select query

        $query = "SELECT
                     p.name, p.id, p.price_per_unit, p.basic_unit, p.tax_percentage, p.developer, p.publisher, p.platform, p.pegi, p.ean, p.stock, p.description
                    FROM 
                    " . $this->table_name . " 
                    p "
                       
                                ;
        // $query = "SELECT name, id,price_per_unit,tax_percentage,developer,publisher,platform,pegi,ean,stock,description";


        // prepare query statement
        $stmt = $this->connection->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
