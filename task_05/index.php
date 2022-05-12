<?php

$number = random_int(1000, 9999);

echo $number, PHP_EOL;

$sum = ($number - $number % 1000) / 1000;
$number -= $number - $number % 1000;

$sum += ($number - $number % 100) / 100;
$number -= $number - $number % 100;

$sum += ($number - $number % 10) / 10;
$number -= $number - $number % 10;

$sum += $number;

echo $sum, PHP_EOL;
