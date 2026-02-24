<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

unset($numbers[1]);

var_dump($numbers);
print(PHP_EOL);

$values = &$numbers;

unset($values[2]);

var_dump($numbers);
print(PHP_EOL);
