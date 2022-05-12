<?php

$finger = random_int(1, 5);

$fingers = [
    1 => 'Мізинець',
    2 => 'Підмізинний',
    3 => 'Середній',
    4 => 'Указівний',
    5 => 'Великий'
];

echo  $finger, PHP_EOL;
echo $fingers[$finger] . ' палець', PHP_EOL;

if(3 == $finger){
    echo 'Прошу помітити, ваш комп\'ютер згенерував це число', PHP_EOL;
}