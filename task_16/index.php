<?php

$randomIntegers = [1, 1, 1, 6, 2, 6, 3, 3, 1, 8, 1, 3, 2, 9, 8, 7, 1, 3, 6, 11, 16, 11];
$unrepeatedIntegers = [];
$isRepeat = false;
$i = 0;

echo json_encode($randomIntegers) . ' ';

sort($randomIntegers);

foreach ($randomIntegers as $key1 => $value1) {
    $key2 = $key1 + 1;
    foreach ($randomIntegers as $key2 => $value2) {
        if ($value1 === $value2 && false === $isRepeat) {
            $unrepeatedIntegers[$i] = $value1;
            $isRepeat = true;
            break;
        }
    }

    if (true === $isRepeat) {
        if ($value1 === $unrepeatedIntegers[$i]) {
            continue;
        } else {
            $isRepeat = false;
            ++$i;
        }
    }
}

echo json_encode($unrepeatedIntegers), PHP_EOL;
