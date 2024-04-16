<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Main Menu</h1>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="tierlist.php">Tier List</a></li>
                <li><a href="admin.php">Admin Panel</a></li> <!-- Updated link to Admin Panel -->
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Tier List</h2>
        <div class="tier-list">
            <?php
            // Read the games.json file and decode its content into a PHP array
            $games = json_decode(file_get_contents('games.json'), true);

            // Check if the $games array is not empty
            if (!empty($games)) {
                // Iterate through each tier and display the games
                foreach ($games as $tier => $gamesInTier) {
                    echo "<div class='tier'>";
                    echo "<h3>$tier</h3>";
                    echo "<div class='card-container'>";
                    foreach ($gamesInTier as $game) {
                        echo "<div class='card'>$game</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                // Display a message if no games are available
                echo "<p>No games available.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
