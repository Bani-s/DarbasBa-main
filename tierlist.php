<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tier List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Main Menu</h1>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="tierlist.php">Tier List</a></li>
                <li><a href="admin.php">Admin Panel</a></li> <!-- Link to Admin Panel -->
            </ul>
        </div>
    </nav>
    <div class="container">
    <h2>Tier List</h2>
    <?php
    $games = json_decode(file_get_contents('games.json'), true);
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
    ?>
</div>

    </div>
</body>
</html>
