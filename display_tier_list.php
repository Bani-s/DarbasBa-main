<?php
$games = json_decode(file_get_contents('games.json'), true);

echo "<div class='tier'>";
echo "<h2>All Games</h2>";
echo "<ul>";
foreach ($games as $game) {
    echo "<li>$game</li>";
}
echo "</ul>";
echo "</div>";
?>
