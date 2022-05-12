<?php

$year = random_int(0, 9999);

echo "Year: {$year}", PHP_EOL;
if(0 == $year % 4){
    echo "Yes it's a leap year", PHP_EOL;
}else{
    echo "No it's not a leap year", PHP_EOL;
}
