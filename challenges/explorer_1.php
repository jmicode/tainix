<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'EXPLORER_1';

$game = new Game($key, $engine);
$data = $game->input();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// exit;

// ------------------ CODE DU CHALLENGE ------------------
// $data = array();
// $data['planetes'] = ['TYL758:continental cool', 'CEL947:froid', 'JBV433:pluvieux averses, tropical jungle, pluvieux', 'XQD763:humide', 'YJO125:chaud', 'IEW841:humide', 'DYD625:continental, polaire glacial, humide et moite', 'JIA269:humide, polaire, froid, continental', 'QSC281:tropical jungle', 'QOZ628:tropical jungle, polaire glacial', 'QYK956:tropical jungle', 'NHP162:froid venteux', 'UUH707:polaire glacial'];
// $data['climat'] = 'humide';
// $data['planetes'] = ['HUN201:polaire', 'RNF446:continental', 'VRZ267:polaire glacial', 'JAF900:chaud fournaise', 'GTP106:polaire glacial', 'NXQ938:aride, froid, pluvieux averses, froid venteux', 
// 'ZQL766:polaire', 'MVN308:chaud', 'OBP806:pluvieux, chaud, continental', 'AKH990:pluvieux, tropical jungle, polaire', 'UHK079:humide', 'LSO900:continental cool', 
// 'RRN725:chaud', 'VLI525:aride sans vie', 'OIU211:aride', 'NBB681:aride, chaud, aride sans vie', 'VFN412:aride sans vie, pluvieux averses, pluvieux', 
// 'YBI613:chaud', 'MTR672:tropical', 'ABL853:aride', 'VKJ515:pluvieux averses', 'TIY544:chaud', 'DJI096:aride sans vie', 'WMR341:pluvieux, pluvieux averses, froid venteux', 
// 'HNH733:humide'];
// $data['climat'] = 'pluvieux';

$planetes = $data['planetes'];
$climat = $data['climat'];

$response="";
for($j=0;$j<count($planetes);$j++){
    $observation = explode(':', $planetes[$j]);
    $climats = explode(', ', $observation[1]);

    if (in_array($climat, $climats, false)) {
        print_r(substr($observation[0], 0 , 3));    
        $response.=substr($observation[0], 0 , 3);
    }

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
