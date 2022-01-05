<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'TENNIS_1';

$game = new Game($key, $engine);
$data = $game->input();

echo '<pre>';
print_r($data);
echo '</pre>';

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();
// $data['time']=262;
// $data['actions']="BBBBBBBBBBBBBIIIIIIIIIIMMMMMMMMMEEEEEEEE";
// $data['references']="B:7 I:4 M:3 E:8";

$time = $data['time'];
$actions = $data['actions'];
$references = initializeReferences($data['references']);

$result = 0;

$max = strlen($actions);

for($i=0;$i<$max;$i++){
//    printf("%s %d %d\n",$actions[$i],$references[$actions[$i]],$result);
    $result+=$references[$actions[$i]];

}

$response = (($result > $time) ? "PRISON" : "ESCAPE").abs($result - $time);

printf("%d %s", $result, $response);

// DÃ©commente pour repondre au challenge
// $game->output(['data' => $response]);




function initializeReferences($strReferences){
    $elts = explode(" ", $strReferences);
    
    $references = array();
    foreach($elts as $elt) {
        $tmp = explode(":", $elt);
        $references[$tmp[0]]=$tmp[1];
    }
    
    return $references;
}
