<?php

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is int? ' . (is_int($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_integer($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_long($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of number: ' . gettype($someValue) . PHP_EOL);
print('Is int? ' . (is_int($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_integer($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is int? ' . (is_long($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
