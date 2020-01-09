<?php

// Creates connection with GamePlanet database
$GamePlanet = new videogames;

$diablo = array(
    new game("Diablo 2", "20", "Blizzard New York", "Blizzard Entertainment", "PC", "13", "5030917144486", "6", "Diablo II is a genre-defining action-RPG set in Sanctuary, a world ravaged by the eternal conflict between angels and demons."),
    // new game("Diablo 2", "70", "Blizzard New York", "Blizzard Entertainment", "XBOX One", "13", "5030917144486", "32", "Diablo III is a genre-defining action-RPG set in Sanctuary, a world ravaged by the eternal conflict between angels and demons."),
    // new game("Diablo 2", "70", "Blizzard New York", "Blizzard Entertainment", "Playstation 4", "13", "5030917144486", "39", "Diablo III is a genre-defining action-RPG set in Sanctuary, a world ravaged by the eternal conflict between angels and demons."),
    // new game("Diablo 2", "70", "Blizzard New York", "Blizzard Entertainment", "Nintendo Switch", "13", "5030917144486", "19", "Diablo III is a genre-defining action-RPG set in Sanctuary, a world ravaged by the eternal conflict between angels and demons.")
);

foreach($diablo as $game){
    $GamePlanet->insert($game);
}



?>