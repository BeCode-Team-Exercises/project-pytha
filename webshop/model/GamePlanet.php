<?php

include 'connection.php';


// Class constructor to make a game object, other info is filled in database
Class game
{
    function __construct($name, $price, $developer, $publisher, $platform, $pegi, $ean, $stock, $description)
    {
        $this->name = $name;
        $vat = 21;
        $price = $price-(($price/100)*$vat);
        $this->price = $price;
        $this->developer = $developer;
        $this->publisher = $publisher;
        $this->platform = $platform;
        $this->pegi = $pegi;
        $this->ean = $ean;
        $this->stock = $stock;
        $this->description = $description;
    }
}

//  Database connection with Game Planet store
//  And functions to get control of it
Class videogames extends webshopdatabase
{
    function selectAll()
    {
        $sql = "SELECT * FROM 'GamePlanetProducts'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectById($id)
    {
        $sql = "SELECT * FROM 'GamePlanetProducts' WHERE 'id' = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function selectByName($name)
    {
        $sql = "SELECT * FROM 'GamePlanetProducts' WHERE 'name' = :name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function selectByEAN($ean)
    {
        $sql = "SELECT * FROM 'GamePlanetProducts' WHERE 'ean' = :ean";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $ean);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function insert($product)
    {
        $sql = "INSERT INTO GamePlanetProducts(name,price_per_unit,developer,publisher,platform,pegi,ean, stock, description) VALUES (:name, :price_per_unit, :developer, :publisher, :platform, :pegi, :ean, :stock, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $product->name);
        $stmt->bindValue(':price_per_unit', $product->price);
        $stmt->bindValue(':developer', $product->developer);
        $stmt->bindValue(':publisher', $product->publisher);
        $stmt->bindValue(':platform', $product->platform);
        $stmt->bindValue(':pegi', "13");
        $stmt->bindValue(':ean', $product->ean);
        $stmt->bindValue(':stock', $product->stock);
        $stmt->bindValue(':description', $product->description);
        $stmt->execute();
    }

    function deleteProduct($id)
    {
        $sql = "DELETE FROM 'GamePlanetProducts' WHERE 'id' = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

