<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'CARS_1';

$game = new Game($key, $engine);
$data = $game->input();

echo '<pre>';
print_r($data);
echo '</pre>';

// ------------------ CODE DU CHALLENGE ------------------

$plates = $data['plates'];
$result = 0;
foreach($plates as $plate) {
    $result += pow(10, processPlate($plate));
}

$response = $result;

// DÃ©commente pour repondre au challenge
$game->output(['data' => $response]);


function processPlate($plate){
    $i = 0;
    $i += (int) ($plate[0] == $plate[8]);
    $i += (int) ($plate[1] == $plate[7]);
    $i += (int) ($plate[3] == $plate[5]);
    
    return $i;
}
