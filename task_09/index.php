<?php

$number = random_int(0, 9999);
//$number = ;
$thousands = 0;
$hundreds = 0;
$dozens = 0;
$units = 0;

if((int)($number / 1000)){
    $thousands = (int)($number / 1000);
    $number -= ($number - $number % 1000);
}

if((int)($number / 100)){
    $hundreds = (int)($number / 100);
    $number -= ($number - $number % 100);
}

if((int)($number / 10)){
    $dozens = (int)($number / 10);
    $number -= ($number - $number % 10);
}

if($number){
    $units = $number;
}

$number = $thousands * 1000 + $hundreds * 100 + $dozens * 10 + $units;

//масив для запису чотиризначноого (и меньшого) числа словами
$numberToWord = [
    ['одна', 'дві', 'три', 'чотири', 'п\'ять', 'шість', 'сім', 'вісім', 'дев\'ять'],
    ['сто', 'двісті', 'триста', 'чотириста', 'п\'ятсот', 'шістсот', 'сімсот', 'вісімсот', 'дев\'ятсот'],
    ['десять', 'двадцять', 'тридцять', 'сорок', 'п\'ятдесят', 'шістдесят', 'сімдесят', 'вісімдесят', 'дев\'яносто'],
    ['один', 'два', 'три', 'чотири', 'п\'ять', 'шість', 'сім', 'вісім', 'дев\'ять'],
    ['одинадцять', 'дванадцять', 'тринадцять', 'чотирнадцять', 'п\'ятнадцять', 'шістнадцять', 'сімнадцять', 'вісімнадцять', 'дев\'ятнадцять']
];

$currency = [
    0 => 'доларів',
    1 => 'долари',
    2 => 'долар'
];

echo $number.' - ';

if($thousands){
    if(5 <= $thousands){
        echo $numberToWord[0][$thousands - 1]. ' тисяч ';
    }elseif(1 < $thousands){
        echo $numberToWord[0][$thousands - 1]. ' тисячі ';
    }else{
        echo $numberToWord[0][$thousands - 1]. ' тисяча ';
    }
}

if($hundreds){
    echo $numberToWord[1][$hundreds - 1]. ' ';
}

if($dozens){
    if(1 == $dozens && 0 < $units){
        echo $numberToWord[4][$units - 1]. ' ';
        $units = 0;
    }else{
        echo $numberToWord[2][$dozens - 1]. ' ';
    }
}

if($units){
    echo $numberToWord[3][$units - 1]. ' ';
}

if(!$number){
    echo 'нуль ';
}

if($number){
    if(1 == $dozens && 0 < $units){
        echo $currency[0];
    }elseif(5 <= $units){
        echo $currency[0];
    }elseif(1 < $units){
        echo $currency[1];
    }elseif(1 == $units){
        echo $currency[2];
    }else{
        echo $currency[0];
    }
}else{
    echo $currency[0];
}

echo PHP_EOL;
