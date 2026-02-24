<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

$numbers[1] = 5;

var_dump($numbers);
print(PHP_EOL);

$values = &$numbers;

$values[2] = 9;

var_dump($numbers);
print(PHP_EOL);
