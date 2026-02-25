<?php

$someArray = [null, true, 3, 'orange'];

print('Type of array: ' . gettype($someArray) . PHP_EOL);
print('Is array? ' . (is_array($someArray) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someAssociativeArray = [
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];

print('Type of associative array: ' . gettype($someAssociativeArray) . PHP_EOL);
print('Is array? ' . (is_array($someAssociativeArray) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is array? ' . (is_array($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
