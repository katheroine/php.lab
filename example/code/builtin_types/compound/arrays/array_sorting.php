<?php

$someNumbers = [7, 9, 2, 6, 3];
$someValues = [5.2, 5.1, 3, 2.9, 5.0];
$someThings = [3.14, 0, true, null, 'cyan', false, 5, 'blue', 3.2, 'aqua'];
$someItems = [
    3 => 1,
    'number' => 3.14,
    5 => 'five',
    'color' => 'orange',
    1 => 2,
    'animal' => 'rabbit',
    4 => 0,
];

print("Numbers:\n\n");
print_r($someNumbers);
print(PHP_EOL);

sort($someNumbers);

print_r($someNumbers);
print(PHP_EOL);

print("Values:\n\n");
print_r($someValues);
print(PHP_EOL);

sort($someValues);

print_r($someValues);
print(PHP_EOL);

print("Things:\n\n");
print_r($someThings);
print(PHP_EOL);

sort($someThings);

print_r($someThings);
print(PHP_EOL);

print("Items:\n\n");
print_r($someItems);
print(PHP_EOL);

sort($someItems);

print_r($someItems);
print(PHP_EOL);
