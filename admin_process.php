<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newGame = $_POST['game'];
    $tier = $_POST['tier'];

    // Load current games from JSON file
    $games = json_decode(file_get_contents('games.json'), true);

    // Add new game to the selected tier
    $games[$tier][] = $newGame;

    // Save the updated game list back to the JSON file
    file_put_contents('games.json', json_encode($games, JSON_PRETTY_PRINT));

    // Redirect back to admin page after adding the game
    header('Location: admin.php');
}
?>
