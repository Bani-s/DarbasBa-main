<?php
// Check if the game ID is provided via GET request
if (isset($_GET['id'])) {
    $gameId = $_GET['id'];

    // Load and decode JSON data from games.json
    $gamesData = file_get_contents('games.json');

    // Check if data was loaded successfully
    if ($gamesData === false) {
        die('Error: Unable to read games data.');
    }

    // Decode JSON data into an associative array
    $games = json_decode($gamesData, true);

    // Check if JSON decoding was successful
    if ($games === null) {
        die('Error: Invalid JSON format in games data.');
    }

    // Check if the game ID exists in the array
    if (array_key_exists($gameId, $games)) {
        // Remove the game from the array
        unset($games[$gameId]);

        // Encode the updated array back to JSON format
        $updatedGamesData = json_encode($games, JSON_PRETTY_PRINT);

        // Write the updated JSON data back to the games.json file
        if (file_put_contents('games.json', $updatedGamesData) !== false) {
            // Redirect back to admin.php after successful deletion
            header("Location: admin.php");
            exit;
        } else {
            echo 'Error: Unable to update games data.';
        }
    } else {
        echo 'Error: Game ID not found.';
    }
} else {
    echo 'Error: Game ID not provided.';
}
?>
