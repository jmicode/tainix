<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'DBZ_1';

$game = new Game($key, $engine);
$data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();
// $data['ennemis'] = [216, 445, 639, 1229];
// $data['force_vegeta'] = 181;

$ennemis = $data['ennemis'];
$force_vegeta = $data['force_vegeta'];

$level = 1;

foreach($ennemis as $ennemi){
    //printf("%d:%d:%d\n", $level, $force_vegeta, $ennemi);
    while(($force_vegeta * $level) < $ennemi){
        $level++;
        printf("Super Sayan %d:%d\n", $level, $force_vegeta);    
    }
    $gain = intval($ennemi / 10);
    $force_vegeta = $force_vegeta + $gain;

    printf("%d:%d:%d:%d\n", $level, $force_vegeta, $ennemi, $gain);
}

$response = "".$force_vegeta * $level;

printf("%s", $response);

// DÃ©commente pour repondre au challenge
$game->output(['data' => $response]);

