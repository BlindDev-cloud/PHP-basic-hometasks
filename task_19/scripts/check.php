<?php

function calculate($a, $b, $operator) :int|float{
    $result = match ($operator){
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $a / $b
    };

    if('double' === gettype($result)){
        return round($result, 2);
    }

    return $result;
}

// 1. Check request

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    exit;
}

// 2. Validate data

if (!isset($_POST['condition']) || !isset($_POST['answer'])) {
    exit('Не торкайтеся консолі.');
}

if (12 !== count($_POST['condition']) || 12 !== count($_POST['answer'])) {
    exit('Чому елементів не 12? Не торкайтеся консолі!');
}

$condition = $_POST['condition'];
$answer = $_POST['answer'];

foreach ($condition as $value) {
    if (0 === preg_match('/^(-|)(100|\d{1,2})\s([-+*\/])\s(-|)(100|\d{1,2})$/', $value)) {
        exit('Неправильний формат умови');
    }
}

foreach ($answer as $value) {
    if (0 === preg_match('/^(-|)((10000|\d{1,4})|(10000|\d{1,4})\.(\d{1,2}))$/', $value)) {
        exit('Невірний формат відповіді');
    }
}

// 3. Check asnswer

$count = 0;
for($i = 0; $i < 12; ++$i){
    [$a, $operator, $b] = explode(' ', $condition[$i]);
    if(calculate((int)$a, (int)$b, $operator) == (int)$answer[$i]){
        ++$count;
    }
}

// 4. Send feedback

echo '<h1>'.$count.'/12</h1>';




