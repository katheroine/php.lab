<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
    5 => 'other value'
];

print("Array:\n");
var_dump($someArray);
print(PHP_EOL);

$arrayValues = array_values($someArray);

print("Values:\n");
var_dump($arrayValues);
print(PHP_EOL);
