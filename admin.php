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
                    // Implement code to add the game to the database or JSON file
                }
                break;
            case "edit":
                // Process editing an existing game
                if (isset($_POST["name"]) && isset($_POST["tier"])) {
                    $name = $_POST["name"];
                    $tier = $_POST["tier"];
                    // Implement code to edit the game in the database or JSON file
                }
                break;
            case "delete":
                // Process deleting an existing game
                if (isset($_POST["name"])) {
                    $name = $_POST["name"];
                    // Implement code to delete the game from the database or JSON file
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
        <h2>Delete Game</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="delete">
            <label for="delete-name">Name:</label>
            <input type="text" id="delete-name" name="name" required>
            <input type="submit" value="Delete Game">
        </form>
        <h2>Edit Game</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="edit">
            <label for="edit-name">Name:</label>
            <input type="text" id="edit-name" name="name" required>
            <label for="edit-tier">New Tier:</label>
            <input type="text" id="edit-tier" name="tier" required>
            <input type="submit" value="Edit Game">
        </form>
    </div>
</body>
</html>
