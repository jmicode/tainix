<?php
require('../Game.php');

// Ta key
$key = 'b1000ea71e47b2d80ceab0c7b1a0516dd51ecd6b';
// Le code du challenge
$engine = 'SECURITY_2';

$game = new Game($key, $engine);
$data = $game->input();

echo '<pre>';
//print_r($data);
echo '</pre>';

// ------------------ CODE DU CHALLENGE ------------------
// $words = ['paternel', 'berceaux', 'embaumai', 'grenat', 'barbarie', 'teillent'];
// $keys = [11, 7];

$words = $data['words'];
$keys = $data['keys'];

// $letter2Value=initializeAssociativeArray("a:1 b:2 c:3 d:4 e:5 f:6 g:7 h:8 i:9 j:10 k:11 l:12 m:13 n:14 o:15 p:16 q:17 r:18 s:19 t:20 u:21 v:22 w:23 x:24 y:25 z:26");
// $value2Letter=initializeAssociativeArray("1:a 2:b 3:c 4:d 5:e 6:f 7:g 8:h 9:i 10:j 11:k 12:l 13:m 14:n 15:o 16:p 17:q 18:r 19:s 20:t 21:u 22:v 23:w 24:x 25:y 26:z");

$letter2Value=initializeAssociativeArray("a:0 b:1 c:2 d:3 e:4 f:5 g:6 h:7 i:8 j:9 k:10 l:11 m:12 n:13 o:14 p:15 q:16 r:17 s:18 t:19 u:20 v:21 w:22 x:23 y:24 z:25");
$value2Letter=initializeAssociativeArray("0:a 1:b 2:c 3:d 4:e 5:f 6:g 7:h 8:i 9:j 10:k 11:l 12:m 13:n 14:o 15:p 16:q 17:r 18:s 19:t 20:u 21:v 22:w 23:x 24:y 25:z");

$result = [];
foreach($words as $word) {
    $result[] = processWord($word, $keys, $letter2Value, $value2Letter);
}

printf("%s\n", implode("-",$words));
printf("%s\n", implode("-",$result));
// printf("qhizmuzy-szmdzhta-zjshtjhr-vmzuhi-shmshmrz-izryyzui\n");
// print_r($letter2Value);
// print_r($value2Letter);

// DÃ©commente pour repondre au challenge
$game->output(['data' => implode("-",$result)]);




function processWord($word, $keys, $letter2Value, $value2Letter){

    $max = strlen($word);
    $result="";
    for($i=0;$i<$max;$i++){

        // printf(
        //     "%s %s %s %s %s %s %s \n",
        //     $word[$i],
        //     $letter2Value[$word[$i]],
        //     $keys[0],
        //     $keys[1],
        //     $letter2Value[$word[$i]] * $keys[0],
        //     ($letter2Value[$word[$i]] * $keys[0]) + $keys[1],
        //     (($letter2Value[$word[$i]] * $keys[0]) + $keys[1]) % 26
        // );

        $tmp = ((($letter2Value[$word[$i]] * $keys[0]) + $keys[1]) % 26);
        // if ($tmp == 0) {
        //     $tmp = 26;
        // }
        $result.=$value2Letter[$tmp];
    
    }
    return $result;
}

// "a:1 b:2 c:3 d:4 e:5 f:6 g:7 h:8 i:9 j:10 k:11 l:12 m:13 n:14 o:15 p:16 q:17 r:18 s:19 t:20 u:21 v:22 w:23 x:24 y:25 z:26";
// "1:a 2:b 3:c 4:d 5:e 6:f 7:g 8:h 9:i 10:j 11:k 12:l 13:m 14:n 15:o 16:p 17:q 18:r 19:s 20:t 21:u 22:v 23:w 24:x 25:y 26:z";
// "a:0 b:1 c:2 d:3 e:4 f:5 g:6 h:7 i:8 j:9 k:10 l:11 m:12 n:13 o:14 p:15 q:16 r:17 s:18 t:19 u:20 v:21 w:22 x:23 y:24 z:25";
// "0:a 1:b 2:c 3:d 4:e 5:f 6:g 7:h 8:i 9:j 10:k 11:l 12:m 13:n 14:o 15:p 16:q 17:r 18:s 19:t 20:u 21:v 22:w 23:x 24:y 25:z";
function initializeAssociativeArray($associativeString){
    $elts = explode(" ", $associativeString);
    
    $associativeArray = array();
    foreach($elts as $elt) {
        $tmp = explode(":", $elt);
        $associativeArray[$tmp[0]]=$tmp[1];
    }
    
    return $associativeArray;
}
