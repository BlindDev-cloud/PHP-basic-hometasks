<?php

$degrees = random_int(0, 360);

echo "Degrees: {$degrees}", PHP_EOL;

//$hours = ($degrees * 4 / 60);
//$hours -= $hours - $hours % 60;
//more correct way
$degrees = $degrees - $degrees % 15;
$hours = $degrees / 15;

echo "Hours: {$hours}", PHP_EOL;