<?php

$someArrayClassic = array(true, 15, 'hello');
$someAssociativeArrayClassic = [
    'some_key' => 'some value',
    3 => 10.5,
    5.6 => false,
];

print("Classic array():\n");
var_dump($someArrayClassic);
print("Classic associative array():\n");
var_dump($someAssociativeArrayClassic);

print(PHP_EOL);

$someArrayContemporary = [3, 20, false];
$someAssociativeArrayContemporary = [
    'otherKey' => 'ok',
    2 => 1024,
];

print("Contemporary []:\n");
var_dump($someArrayClassic);
print("Contemporary associative []:\n");
var_dump($someAssociativeArrayContemporary);

print(PHP_EOL);
