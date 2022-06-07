<?php

$randomIntegers = [1, 1, 1, 6, 2, 6, 3, 3, 1, 8, 1, 3, 2, 9, 8, 7, 1, 3, 6];
$unrepeatedIntegers = [];

echo json_encode($randomIntegers) . ' ';

$i = 0;
$j = 1;
$once = false;

while ($i < count($randomIntegers)) {
    while ($j < count($randomIntegers)) {
        if ($randomIntegers[$i] === $randomIntegers[$j]) {
            if (false === $once) {
                $unrepeatedIntegers[] = $randomIntegers[$i];
                $once = true;
            }

            unset($randomIntegers[$j]);
            $randomIntegers = array_values($randomIntegers);
        } else {
            ++$j;
        }
    }

    ++$i;
    $j = $i + 1;
    $once = false;
}

echo json_encode($unrepeatedIntegers), PHP_EOL;



