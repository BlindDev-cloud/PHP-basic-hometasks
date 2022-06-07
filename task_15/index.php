<?php

$randomIntegers = [1, 2, 3, 5, 9, 12];
$length = count($randomIntegers);

for ($i = 0; $i < $length; ++$i) {
    for ($j = $i + 1; $j < $length; ++$j) {
        if ($randomIntegers[$i] === $randomIntegers[$j]) {
            echo json_encode($randomIntegers) . ' Yes' . PHP_EOL;
            exit;
        }
    }
}

echo json_encode($randomIntegers) . ' No' . PHP_EOL;
