<?php
// Load games from JSON file
$games = json_decode(file_get_contents('games.json'), true);

// Check if the JSON file was successfully loaded
if ($games === null) {
    // Handle the case where JSON decoding failed
    echo "Failed to load games.";
    exit;
}
?>
