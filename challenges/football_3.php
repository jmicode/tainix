<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'FOOTBALL_3';

$game = new Game($key, $engine);
$data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();
// $data['group'] = ['RUS', 'CRO', 'HON', 'REP'];
// $data['scores'] = ['RUS_CRO_1_1', 'RUS_HON_1_0', 'RUS_REP_1_0', 'CRO_RUS_4_1', 'CRO_HON_1_1', 'CRO_REP_0_0', 'HON_RUS_0_0', 'HON_CRO_0_2', 'HON_REP_0_0', 'REP_RUS_1_4', 'REP_CRO_0_1', 'REP_HON_1_0'];

$group = $data['group'];
$scores = $data['scores'];

// printf("%d:%d:%d:%d:%d:%d\n", $pJN, $pJD, $jJN, $jJD, $sJN, $sJD);
$pouleScore = array();

for($i=0;$i<count($group);$i++){
    $pouleScore[$group[$i]] = 0;
}

for($j=0;$j<count($scores);$j++){
    $match = explode('_', $scores[$j]);
    print_r($pouleScore);
    print_r($match);


    $eq1 = $match[0];
    $eq2 = $match[1];
    $but1 = $match[2];
    $but2 = $match[3];

    if ($match[2] === $match[3]) {
        $pouleScore[$match[0]]++;
        $pouleScore[$match[1]]++;
        continue;
    }

    if ($match[2] < $match[3]) {
        $pouleScore[$match[1]] = $pouleScore[$match[1]] + 3;
        continue;
    }

    $pouleScore[$match[0]] = $pouleScore[$match[0]] + 3;

}

arsort($pouleScore);
print_r($pouleScore);

$response="";
foreach($pouleScore as $key => $value) {
    $response.=$key;    
}
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
