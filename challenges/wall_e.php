<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'WALL_E';

$game = new Game($key, $engine);
$data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();

// $data['force'] = 11;
// $data['vitesse'] = 8;
// $data['batterie'] = 82;
// $data['dechets'] = [35, 24, 17, 19, 8];

$force = $data['force'];
$vitesse = $data['vitesse'];
$batterie = $data['batterie'];
$dechets = $data['dechets'];

$traite = "oui";
$response = "";
$cost = 0;
foreach($dechets as $dechet){
    $action = "recharge";
    // recharge
    if ($batterie <= 20) {
        $batterie = 100 - $vitesse;
        printf("%d:%d - %d => %d (%s)\n", $force, $batterie, $dechet, $cost, $action);
    }
    $action = "traite";
    if ($dechet <= $force) {
        $cost = 1;
        $batterie = $batterie - $cost;
        printf("%d:%d - %d => %d (%s)\n", $force, $batterie, $dechet, $cost, $action);
        continue;
    }
    if ($dechet > $force) {
        $cost = ($dechet - $force) * 2;
        if (($cost * 2) > $batterie){
            $action = "laisse";
            $cost = 2;
        }
        $batterie = $batterie - $cost;
        printf("%d:%d - %d => %d (%s)\n", $force, $batterie, $dechet, $cost, $action);
        continue;
    }
    //$response .= chr($ascii - $decalage);
}

$response = $batterie;
printf("%s", $response);

// DÃ©commente pour repondre au challenge
$game->output(['data' => $response]);

