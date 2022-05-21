<?php

//$year = random_int(0, 9999);

echo 'Year: '.$year.' ';

if(0 == $year % 4){
    if(0 == $year % 100){
        if(0 == $year % 400){
            echo 'is a leap year.';
        }else{
            echo 'is not a leap year.';
        }
    }else{
        echo 'is a leap year.';
    }
}else{
    echo 'is not a leap year.';
}

echo PHP_EOL;
