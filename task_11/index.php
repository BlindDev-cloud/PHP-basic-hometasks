<?php

$number = '385643972095';

$phoneNumber = match(strlen($number)){
    12 => sprintf("+%s (%s) %s-%s-%s", substr($number, 0, 3), substr($number, 3, 2), substr($number, 5, 3), substr($number, 8, 2), substr($number, 10, 2)),
    9 => sprintf("+380 (%s) %s-%s-%s", substr($number, 0, 2), substr($number, 2, 3), substr($number, 5, 2), substr($number, 7, 2)),
    default => 'ERROR'
};

echo $phoneNumber.PHP_EOL;
