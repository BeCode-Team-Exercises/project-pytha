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
    // Read all the products
    function read()
    {
        //select query

        $query = "SELECT
                     p.name, p.id, p.price_per_unit, p.basic_unit, p.tax_percentage, p.developer, p.publisher, p.platform, p.pegi, p.ean, p.stock, p.description
                    FROM 
                    " . $this->table_name . " 
                    p ";
        // $query = "SELECT name, id,price_per_unit,tax_percentage,developer,publisher,platform,pegi,ean,stock,description";
        // prepare query statement
        $stmt = $this->connection->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // Create product with API body
    function create()
    {
        $query = "INSERT INTO " . $this->table_name . "
        SET name=:name, price_per_unit=:price_per_unit, developer=:developer, publisher=:publisher, platform=:platform, pegi=:pegi, ean=:ean, stock=:stock, description=:description ";

        $stmt = $this->connection->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price_per_unit = htmlspecialchars(strip_tags($this->price_per_unit));
        $this->description = htmlspecialchars(strip_tags($this->description));

        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':price_per_unit', $this->price_per_unit);
        $stmt->bindValue(':developer', $this->developer);
        $stmt->bindValue(':publisher', $this->publisher);
        $stmt->bindValue(':platform', $this->platform);
        $stmt->bindValue(':pegi', "13");
        $stmt->bindValue(':ean', $this->ean);
        $stmt->bindValue(':stock', $this->stock);
        $stmt->bindValue(':description', $this->description);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function readOne()
    {

        // Query to read single product
        $query = "SELECT
            p.name, p.id, p.price_per_unit, p.basic_unit, p.tax_percentage, p.developer, p.publisher, p.platform, p.pegi, p.ean, p.stock, p.description
                 FROM 
                  " . $this->table_name . " p
                          WHERE p.id=? LIMIT 0,1";

        // Prepare query statement
        $stmt = $this->connection->prepare($query);

        // Bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        // Get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set values to object properties
        $this->name = $row['name'];
        $this->price_per_unit = $row['price_per_unit'];
        $this->basic_unit = $row['basic_unit'];
        $this->tax_percentage = $row['tax_percentage'];
        $this->developer = $row['developer'];
        $this->publisher = $row['publisher'];
        $this->platform = $row['platform'];
        $this->pegi = $row['pegi'];
        $this->ean = $row['ean'];
        $this->stock = $row['stock'];
        $this->description = $row['description'];
    }

    function update()
    {
        $query = "UPDATE " .
            $this->table_name . "
                        SET
                        name=:name,
                        price_per_unit = :price_per_unit,
                        basic_unit=:basic_unit,
                        tax_percentage = :tax_percentage,
                        developer = :developer,
                        publisher = :publisher,
                        platform = :platform,
                        pegi = :pegi,
                        ean = :ean,
                        stock = :stock,
                        description = :description

                        WHERE 
                            id = :id";

        //prepare query
        $stmt = $this->connection->prepare($query);

        // Bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price_per_unit', $this->price);
        $stmt->bindParam(':basic_unit', $this->basic_unit);
        $stmt->bindParam(':tax_percentage', $this->tax_percentage);
        $stmt->bindParam(':developer', $this->developer);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':platform', $this->platform);
        $stmt->bindParam(':pegi', $this->pegi);
        $stmt->bindParam(':ean', $this->ean);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function search($keywords)
    {
        // Query
        json_encode(array("message"=>$keywords));
        $query = "SELECT
        p.name, p.id, p.price_per_unit, p.basic_unit, p.tax_percentage, p.developer, p.publisher, p.platform, p.pegi, p.ean, p.stock, p.description
       FROM 
       " . $this->table_name . " p 
       WHERE 
        p.name LIKE '%".$keywords."%' OR p.description LIKE '%".$keywords."%' OR p.developer LIKE '%".$keywords."%'  OR p.publisher LIKE '%".$keywords."%' OR  p.ean LIKE '%".$keywords."%'  
         ORDER BY p.id DESC
        ";

        // Prepare Query
        $stmt = $this->connection->prepare($query);

        // Execute query
        $stmt->execute();
        return $stmt; 
    }
}
