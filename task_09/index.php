<?php

$number = random_int(0, 9999);
//$number = ;

echo $number . ' - ';

if(!$number){
    echo 'нуль ';
}

$thousand = (int)($number / 1000);
$number -= $number - $number % 1000;
$hundred = (int)($number / 100);
$number -= $number - $number % 100;
$tens = (int)($number / 10);
$number -= $number - $number % 10;
$unit = $number;
$teenNumber = 0;

$thousandToWord = match ($thousand) {
    0 => null,
    1 => 'тисяча ',
    2 => 'дві тисячі ',
    3 => 'три тисячі ',
    4 => 'чотири тисячі ',
    5 => 'п\'ять тисяч ',
    6 => 'шість тисяч ',
    7 => 'сім тисяч ',
    8 => 'вісім тисяч ',
    9 => 'дев\'ять тисяч '
};

$hundredToWord = match ($hundred) {
    0 => null,
    1 => 'сто ',
    2 => 'двісті ',
    3 => 'триста ',
    4 => 'чотириста ',
    5 => 'п\'ятсот ',
    6 => 'шістсот ',
    7 => 'сімсот ',
    8 => 'вісімсот ',
    9 => 'дев\'ятсот '
};

$tensToWord = match ($tens) {
    0 => null,
    1 => 'десять ',
    2 => 'двадцять ',
    3 => 'тридцять ',
    4 => 'сорок ',
    5 => 'п\'ятдесят ',
    6 => 'шістдесят ',
    7 => 'сімдесят ',
    8 => 'вісімдесят ',
    9 => 'дев\'яносто '
};

$teenNumberToWord = match ($unit) {
    0 => null,
    1 => 'одинадцять ',
    2 => 'дванадцять ',
    3 => 'тринадцять ',
    4 => 'чотирнадцять ',
    5 => 'п\'ятнадцять ',
    6 => 'шістнадцять ',
    7 => 'сімнадцять ',
    8 => 'вісімнадцять ',
    9 => 'дев\'ятнадцять '
};

$unitToWord = match ($unit) {
    0 => null,
    1 => 'один ',
    2 => 'два ',
    3 => 'три ',
    4 => 'чотири ',
    5 => 'п\'ять ',
    6 => 'шість ',
    7 => 'сім ',
    8 => 'вісім ',
    9 => 'дев\'ять '
};

$currency = match ($unit) {
    1 => 'долар',
    2, 3, 4 => 'долари',
    default => 'доларів'
};

if (!(1 == $tens && 0 < $unit)) {
    echo $thousandToWord . $hundredToWord . $tensToWord . $unitToWord . $currency;
} else {
    echo $thousandToWord . $hundredToWord . $teenNumberToWord . 'доларів';
}

echo PHP_EOL;
