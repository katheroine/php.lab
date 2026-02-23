<?php

$someArray = [null, true, 3, 'orange'];
$someAssociativeArray = [
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];

print("Information:\n");
var_dump($someArray);
print('Type: ' . gettype($someArray) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($someAssociativeArray);
print('Type: ' . gettype($someAssociativeArray) . PHP_EOL . PHP_EOL);
