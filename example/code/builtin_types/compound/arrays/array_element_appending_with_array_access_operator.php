<?php

$someArray = [
    3 => 'hello',
    'key' => 'value',
    1 => 0.5,
];

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 6;

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 'star';

var_dump($someArray);
print(PHP_EOL);

unset($someArray);

$someArray[] = 16;

var_dump($someArray);
print(PHP_EOL);
