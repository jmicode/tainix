<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'SECRET_1';

// $game = new Game($key, $engine);
// $data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
$data = array();
$data['decalage'] = 1;
$data['mot_crypte'] = 'qfsnjfot';

$decalage = $data['decalage'];
$mot_crypte = $data['mot_crypte'];

$level = 1;
$response = "";
for($i=0; $i < strlen($mot_crypte); $i++){
    //printf("%d:%d:%d\n", $level, $force_vegeta, $ennemi);
    $ascii = ord($mot_crypte[$i]);
    printf("%s:%d - %s:%d\n", $mot_crypte[$i], $ascii, chr($ascii - $decalage), ($ascii - $decalage));
    //attention certainement un pb aux bornes
    // refaire des tests pour avoir des "boucles"
    $response .= chr($ascii - $decalage);
}

printf("%s", $response);

// DÃ©commente pour repondre au challenge
// $game->output(['data' => $response]);

