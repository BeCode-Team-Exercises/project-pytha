<?php
// Creates connection with GamePlanet database
$GamePlanet = new videogames;

// $GamePlanet->insert($game);


// Games to add!
$diablo2 = createPlatforms("diablo2","Diablo 2", "20", "Blizzard Entertainment", "Blizzard San Francisco", "7" ,"13", "3348542160316", "10", "Diablo, the Lord of Terror, has fallen to a brave hero beneath the church of Tristram. Now that hero is gone, replaced by a Dark Wanderer who roams the world of Sanctuary leaving death and destruction in his wake. As a hero of humanity, you must face the minions of Diablo's evil brothers and stop the Dark Wanderer before he fulfills his terrible destiny.");
foreach ($diablo2 as $game) {
    $GamePlanet->insert($game);
}
$gta5 = createPlatforms("gta5", "Grand Theft Auto 5", "30", "Rockstar Games", "Take Two", "7", "18", "5026555424332", "20", "The biggest, most dynamic and most diverse open world ever created and now packed with layers of new detail, Grand Theft Auto V blends storytelling and gameplay in new ways as players repeatedly jump in and out of the lives of the game’s three lead characters, playing all sides of the game’s interwoven story.");
foreach ($gta5 as $game) {
    $GamePlanet->insert($game);
}
$rdr2 = createPlatforms("rdr2", "Red Dead Redemption 2", "70", "Take Two", "Rockstar Games", "7", "16", "5026555423106", "30", "America, 1899. The end of the wild west era has begun as lawmen hunt down the last remaining outlaw gangs. Those who will not surrender or succumb are killed.

After a robbery goes badly wrong in the western town of Blackwater, Arthur Morgan and the Van der Linde gang are forced to flee. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.

From the creators of Grand Theft Auto V and Red Dead Redemption, Red Dead Redemption 2 is an epic tale of life in America at the dawn of the modern age.");
foreach ($rdr2 as $game) {
    $GamePlanet->insert($game);
}

$bf5 = createPlatforms("bf5", "Battlefield V", "50", "EA", "DICE", "7", "16", "5030932122285", "20", "Battlefield V is a first-person shooter video game developed by EA DICE and published by Electronic Arts. Battlefield V is the sixteenth installment in the Battlefield series.");
foreach ($bf5 as $game) {
    $GamePlanet->insert($game);
}


function insert($product)
{


    $sql = "INSERT INTO GamePlanetProducts(name,price_per_unit,developer,publisher,platform,pegi,ean, stock, description) VALUES (:name, :price_per_unit, :developer, :publisher, :platform, :pegi, :ean, :stock, :description)";
    $stmt = $this->connection->prepare($sql);
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


// Use the function if you want to make games for multiple platforms, you will be returned an array of game classes
// $platforms (1:PC, 2:XboxOne, 3:PS4, 4:NS, 5:X1 and PS4, 6:X1 and PS4 and NS, 7:all platform, 8:PC and X1, 9:PC and PS)
function createPlatforms($arrayofgames, $gamename, $price, $publisher, $dev, $platform, $pegi, $ean, $stock, $description)
{
    $arrayofgames = array();
    $platforms = array();
    switch ($platform) {
        case "1":
            array_push($platforms, "PC");
            break;
        case "2":
            array_push($platforms, "Xbox One");
            break;
        case "3":
            array_push($platforms, "Playstation 4");
            break;
        case "4":
            array_push($platforms, "Nintendo Switch");
            break;
        case "5":
            array_push($platforms, "Xbox One");
            array_push($platforms, "Playstation 4");
            break;
        case "6":
            array_push($platforms, "Xbox One");
            array_push($platforms, "Playstation 4");
            array_push($platforms, "Nintendo Switch");
            break;
        case "7":
            array_push($platforms, "PC");
            array_push($platforms, "Playstation 4");
            array_push($platforms, "Xbox One");
            break;
        case "8":
            array_push($platforms, "PC");
            array_push($platforms, "Xbox One");
            break;
        case "9":
            array_push($platforms, "PC");
            array_push($platforms, "Playstation 4");
            break;
    }
    foreach ($platforms as $pos) {
        $currentPrice = $price;
        if (count($platforms) != 1) {
            if ($pos === "PC") {
                $currentPrice -= 10;
            }
        }
        $game = new Game($gamename, $currentPrice, $dev, $publisher, $pos, $pegi, $ean, $stock, $description);
        array_push($arrayofgames, $game);
    }
    return $arrayofgames;
}

// Class constructor to make a game object, other info is filled in database
class Game
{
    function __construct($name, $price, $developer, $publisher, $platform, $pegi, $ean, $stock, $description)
    {
        $this->name = $name;
        $vat = 21;
        // $price = $price - (($price / 100) * $vat);
        $price = 49;
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


class videogames extends webshopdatabase
{
    function selectAll()
    {
        $sql = "SELECT * FROM 'GamePlanetProducts'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}
class webshopdatabase
{
    //properties
    private static $dbHost = "localhost";
    private static $dbName = "api_db";
    private static $dbUser = "root";
    private static $dbPass = "StrongPassword";
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
