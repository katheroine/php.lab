<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
