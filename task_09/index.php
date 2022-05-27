<?php

$number = random_int(0, 9999);
//$number = ;
$thousand = 0;
$hundred = 0;
$dozen = 0;
$unit = 0;

//масив для запису чотиризначноого (и меньшого) числа словами
$numbersToWords = [
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

if($number) {
    if((int)($number / 1000)){
        $thousand = (int)($number / 1000);
        $number -= ($number - $number % 1000);
    }

    if((int)($number / 100)){
        $hundred = (int)($number / 100);
        $number -= ($number - $number % 100);
    }

    if((int)($number / 10)){
        $dozen = (int)($number / 10);
        $number -= ($number - $number % 10);
    }

    if($number){
        $unit = $number;
    }

    if ($thousand) {
        if (5 <= $thousand) {
            echo $numbersToWords[0][$thousand - 1] . ' тисяч ';
        } elseif (1 < $thousand) {
            echo $numbersToWords[0][$thousand - 1] . ' тисячі ';
        } else {
            echo $numbersToWords[0][$thousand - 1] . ' тисяча ';
        }
    }

    if ($hundred) {
        echo $numbersToWords[1][$hundred - 1] . ' ';
    }

    if ($dozen) {
        if (1 == $dozen && 0 < $unit) {
            echo $numbersToWords[4][$unit - 1] . ' ';
            $unit = 0;
        } else {
            echo $numbersToWords[2][$dozen - 1] . ' ';
        }
    }

    if ($unit) {
        echo $numbersToWords[3][$unit - 1] . ' ';
    }
}else{
    echo 'нуль ';
}

if(5 <= $unit || 0 == $unit or 1 == $dozen && 0 < $unit){
    echo $currency[0];
}elseif(1 < $unit){
    echo $currency[1];
}else{
    echo $currency[2];
}

echo PHP_EOL;
