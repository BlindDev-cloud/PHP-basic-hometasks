<?php

$randomIntegers = [8, 35, 35, 18, 1, 1, 8, 1, 6, 8, 35, 1, 35];

$maxValue = max($randomIntegers);
$maxCount = 0;
$minValue = min($randomIntegers);
$minCount = 0;

foreach ($randomIntegers as $number){
    if($maxValue == $number){
        ++$maxCount;
    }

    if($minValue == $number){
        ++$minCount;
    }
}

echo 'Maximum value: '.$maxValue.', count = '.$maxCount.PHP_EOL;
echo 'Minimum value: '.$minValue.', count = '.$minCount.PHP_EOL;

