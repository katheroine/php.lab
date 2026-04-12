<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
