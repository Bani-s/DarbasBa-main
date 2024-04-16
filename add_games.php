<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input data
    if (isset($_POST['name']) && isset($_POST['tier'])) {
        // Sanitize input data to prevent XSS and other security issues
        $name = htmlspecialchars($_POST['name']);
        $tier = htmlspecialchars($_POST['tier']);

        // Read existing games data from JSON file
        $games = json_decode(file_get_contents('games.json'), true);

        // Add the new game to the games array
        $games[] = ['name' => $name, 'tier' => $tier];

        // Write the updated games data back to the JSON file
        file_put_contents('games.json', json_encode($games));

        // Redirect back to the index.php page after adding the game
        header('Location: index.php');
        exit;
    } else {
        // Handle the case where name or tier is not provided
        echo "Name and tier are required.";
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
?>
s