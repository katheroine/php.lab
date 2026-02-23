<?php

$someArray = [null, true, 3, 'orange'];
$someAssociativeArray = [
    'someKey' => 'someValue',
    'otherKey' => 1024,
    10 => true,
];

print("Information:\n");
var_dump($someArray);
print('Type: ' . gettype($someArray) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($someAssociativeArray);
print('Type: ' . gettype($someAssociativeArray) . PHP_EOL . PHP_EOL);
