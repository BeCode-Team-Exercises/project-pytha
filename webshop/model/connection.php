<?php

class webshopdatabase
{
    //properties
    private static $dbHost = "192.168.139.125";
    private static $dbName = "webshops";
    private static $dbUser = "user";
    private static $dbPass = "user";
    private static $sharedPDO;
    protected $PDO;

    //constructor
    function __construct()
    {
        if (empty(self::$sharedPDO)) {
            self::$sharedPDO = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPass);
            self::$sharedPDO->exec("SET CHARACTER SET utf8");
            self::$sharedPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$sharedPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        $this->pdo = &self::$sharedPDO;
    }
}
