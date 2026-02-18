<?php

$someValue = 3.0;
$otherValue = -9.2;

print("Information:\n");
var_dump($someValue);
print('Type: ' . gettype($someValue) . PHP_EOL);
print("As string: {$someValue}\n\n");

print("Information:\n");
var_dump($otherValue);
print('Type: ' . gettype($otherValue) . PHP_EOL);
print("As string: {$otherValue}\n\n");
