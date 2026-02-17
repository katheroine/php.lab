<?php

$someNumber = 3;
$otherNumber = -9;

print("Information:\n");
var_dump($someNumber);
print('Type: ' . gettype($someNumber) . PHP_EOL);
print("As string: {$someNumber}\n\n");

print("Information:\n");
var_dump($otherNumber);
print('Type: ' . gettype($otherNumber) . PHP_EOL);
print("As string: {$otherNumber}\n\n");
