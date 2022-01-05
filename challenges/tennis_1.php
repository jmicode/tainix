<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'TENNIS_1';

$game = new Game($key, $engine);
$data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();
// $data['points']="NNDDDNDDDNDNDNNNDNDNNNNDNNN";

$points = $data['points'];

$nbPoints = strlen($points);

$pJN = 0;
$pJD = 0;
$jJN = 0;
$jJD = 0;
$sJN = 0;
$sJD = 0;
$score = ["0", "15", "30","40"];

// printf("%d:%d:%d:%d:%d:%d\n", $pJN, $pJD, $jJN, $jJD, $sJN, $sJD);

for($i=0;$i<$nbPoints;$i++){

    if ($points[$i] == 'D') {
        $pJD++;
        if ($pJD == 4) {
            $pJD = 0;
            $pJN = 0;
            $jJD++;
            if ($jJD == 6) {
                $jJD = 0;
                $jJN = 0;
                $sJD++;
            }
        }
    }

    if ($points[$i] == 'N') {
        $pJN++;
        if ($pJN == 4) {
            $pJD = 0;
            $pJN = 0;
            $jJN++;
            if ($jJN == 6) {
                $jJD = 0;
                $jJN = 0;
                $sJN++;
            }
        }
    }

    printf("%s %d:%d:%d:%d:%d:%d\n",$points[$i], $pJD, $pJN, $jJD, $jJN, $sJD, $sJN);
}

$response = $jJD.":".$jJN.":".$score[$pJD].":".$score[$pJN];

printf("%s", $response);

// DÃ©commente pour repondre au challenge
$game->output(['data' => $response]);




function initializeReferences($strReferences){
    $elts = explode(" ", $strReferences);
    
    $references = array();
    foreach($elts as $elt) {
        $tmp = explode(":", $elt);
        $references[$tmp[0]]=$tmp[1];
    }
    
    return $references;
}
