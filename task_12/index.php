<?php

$word = 'мадам';
$letters = mb_str_split($word);
$reversedWord = implode(array_reverse($letters));

echo ($word === $reversedWord) ? 'Yes' : 'No', PHP_EOL;

/* Only english
$word = 'abcba';
$reversedWord = strrev($word);

echo ($word === $reversedWord) ? 'Yes' : 'No', PHP_EOL;
*/
