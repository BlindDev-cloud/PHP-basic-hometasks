<?php

$a = 10;
$b = 40;

echo '$a = ' . $a . PHP_EOL;
echo '$b = ' . $b . PHP_EOL;

// My code
$c = $a;
$a = $b;
$b = $c;

echo PHP_EOL;
echo '$a = ' . $a . PHP_EOL;
echo '$b = ' . $b . PHP_EOL;
