<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // If not authenticated, redirect to login page
    header("Location: Login.php");
    exit;
}

// Process the form submission for adding, editing, or deleting a game
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"])) {
        $action = $_POST["action"];
        switch ($action) {
            case "add":
                // Process adding a new game
                if (isset($_POST["name"]) && isset($_POST["tier"])) {
                    $name = $_POST["name"];
                    $tier = $_POST["tier"];
                    $games = json_decode(file_get_contents('games.json'), true);
                    $games[$tier][] = $name;
                    file_put_contents('games.json', json_encode($games, JSON_PRETTY_PRINT));
                    // Redirect back to admin.php or wherever you need
                    header("Location: tierlist.php"); // Redirect to tierlist.php after adding the game
                    exit;
                }
                break;
            case "edit":
                // Process editing an existing game
                if (isset($_POST["name"]) && isset($_POST["tier"]) && isset($_POST["new_name"])) {
                    $name = $_POST["name"];
                    $tier = $_POST["tier"];
                    $newName = $_POST["new_name"];
                    $games = json_decode(file_get_contents('games.json'), true);
                    // Find the game to edit and update its name
                    if (isset($games[$tier])) {
                        $key = array_search($name, $games[$tier]);
                        if ($key !== false) {
                            $games[$tier][$key] = $newName;
                            file_put_contents('games.json', json_encode($games, JSON_PRETTY_PRINT));
                        }
                    }
                    // Redirect back to admin.php or wherever you need
                    header("Location: tierlist.php"); // Redirect to tierlist.php after editing the game
                    exit;
                }
                break;
            case "delete":
                // Process deleting an existing game
                if (isset($_POST["name"]) && isset($_POST["tier"])) {
                    $name = $_POST["name"];
                    $tier = $_POST["tier"];
                    $games = json_decode(file_get_contents('games.json'), true);
                    // Find the game to delete and remove it from the array
                    if (isset($games[$tier])) {
                        $key = array_search($name, $games[$tier]);
                        if ($key !== false) {
                            unset($games[$tier][$key]);
                            file_put_contents('games.json', json_encode($games, JSON_PRETTY_PRINT));
                        }
                    }
                    // Redirect back to admin.php or wherever you need
                    header("Location: tierlist.php"); // Redirect to tierlist.php after deleting the game
                    exit;
                }
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Admin Panel</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Add New Game</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="add">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="tier">Tier:</label>
            <input type="text" id="tier" name="tier" required>
            <input type="submit" value="Add Game">
        </form>
       <!-- Edit Game Form -->
<form action="admin.php" method="post">
    <input type="hidden" name="action" value="edit">
    <label for="edit-name">Name:</label>
    <input type="text" id="edit-name" name="name" required>
    <label for="edit-tier">New Tier:</label>
    <input type="text" id="edit-tier" name="tier" required>
    <input type="submit" value="Edit Game">
</form>

<!-- Delete Game Form -->
<form action="admin.php" method="post">
    <input type="hidden" name="action" value="delete">
    <label for="delete-name">Name:</label>
    <input type="text" id="delete-name" name="name" required>
    <input type="submit" value="Delete Game">
</form>

    </div>
</body>
</html>
