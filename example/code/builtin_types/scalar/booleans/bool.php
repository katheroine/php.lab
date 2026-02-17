<?php

$someRight = true;
$someWrong = false;

print("Information:\n");
var_dump($someRight);
print('Type: ' . gettype($someRight) . PHP_EOL);
print("As string: {$someRight}\n\n");

print("Information:\n");
var_dump($someWrong);
print('Type: ' . gettype($someWrong) . PHP_EOL);
print("As string: {$someWrong}\n\n");
