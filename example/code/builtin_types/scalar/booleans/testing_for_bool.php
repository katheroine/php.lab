<?php

$someRight = true;

print('Type of right: ' . gettype($someRight) . PHP_EOL);
print('Is bool? ' . (is_bool($someRight) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someWrong = false;

print('Type of wrong: ' . gettype($someWrong) . PHP_EOL);
print('Is bool? ' . (is_bool($someWrong) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is bool? ' . (is_null($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
