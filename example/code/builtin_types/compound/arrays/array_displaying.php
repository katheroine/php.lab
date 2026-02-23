<?php

$someArray = [10, 'penguin', true];
$otherArray = [
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
];

print("Some array:\n");
var_dump($someArray);
print(PHP_EOL);
print_r($someArray);
print(PHP_EOL);

print("Other array:\n");
var_dump($otherArray);
print(PHP_EOL);
print_r($otherArray);
print(PHP_EOL);
