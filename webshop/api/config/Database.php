<?php

class Database
{
    private $dbHost = "192.168.139.125";
    private $dbName = "webshops";
    private $dbUser = "user";
    private $dbPass = "pythauser";

    // Reinaert's Test DB
    // private $dbHost = "localhost";
    // private $dbName = "api_db";
    // private $dbUser = "root";
    // private $dbPass = "StrongPassword";
    public $connection;

    public function getConnection(){
        $this->connection = null;

        // try{
        //     $this->connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPass);
        //     $this->connection->exec("set names utf8");
        // } catch(PDOException $exception){
        //     echo "Error :" . $exception->getMessage();
        // }
        try{
            $this->connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUser, $this->dbPass);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connection;
    }


 
}
?>
