<?php

$randomIntegers = [-1, 6, -62, 10, -12, 8];

echo json_encode($randomIntegers).' ';

for($i = 0; $i < count($randomIntegers); ++$i){
    if(0 > $randomIntegers[$i]){
        $randomIntegers[$i] *= -1;
    }
}

echo json_encode($randomIntegers), PHP_EOL;