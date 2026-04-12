<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someEmptyArray = [];
$someIndexedArray = [10, 'penguin', true];
$someAssociativeArray = [
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
];

print("Empty array:\n");
var_dump($someEmptyArray);
print(PHP_EOL);

print("Indexed array:\n");
var_dump($someIndexedArray);
print(PHP_EOL);

print("Associative array:\n");
var_dump($someAssociativeArray);
print(PHP_EOL);
