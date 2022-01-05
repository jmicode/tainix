<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = '';

$game = new Game($key, $engine);
$data = $game->input();

echo '<pre>';
print_r($data);
echo '</pre>';

// ------------------ CODE DU CHALLENGE ------------------

$response = '';

// DÃ©commente pour repondre au challenge
// $game->output(['data' => $response]);