<?php

$string = 'Ця строка з   декількома   зайвими пробілами містить  дев\'ять слів';
$i = 0;
$wordCount = 0;
$space = false;

while ($i < mb_strlen($string)){
    if(' ' === mb_substr($string, $i, 1) && false === $space){
        ++$wordCount;
        $space = true;
    }else{
        while (' ' === mb_substr($string, $i, 1)){
            ++$i;
        }
        $space = false;
    }

    ++$i;
}

echo 'Кількість слів = '.++$wordCount.PHP_EOL;
