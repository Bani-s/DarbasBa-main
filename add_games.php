<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $tier = $_POST['tier'];
    
    $games = json_decode(file_get_contents('games.json'), true);
    $games[] = ['name' => $name, 'tier' => $tier];
    file_put_contents('games.json', json_encode($games));

    header('Location: index.php');
    exit;
}
?>
