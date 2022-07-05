<?php

$randomIntegers = [1, 6, 5, 2, 10, 8, 6];
$length = count($randomIntegers);

sort($randomIntegers);

for($i = 1; $i < $length; ++$i){
    if($randomIntegers[$i - 1] === $randomIntegers[$i]){
        echo 'Has duplicates'.PHP_EOL;
        exit();
    }
}

echo 'Does not have duplicates'.PHP_EOL;

//for ($i = 0; $i < $length; ++$i) {
//    for ($j = $i + 1; $j < $length; ++$j) {
//        if ($randomIntegers[$i] === $randomIntegers[$j]) {
//            echo 'Has duplicates'.PHP_EOL;
//            exit;
//        }
//    }
//}
//
//echo 'Does not have duplicates'.PHP_EOL;
