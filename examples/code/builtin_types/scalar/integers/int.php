<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someNumber = 3;
$otherNumber = -9;

print("Information:\n");
var_dump($someNumber);
print('Type: ' . gettype($someNumber) . PHP_EOL);
print("As string: {$someNumber}\n\n");

print("Information:\n");
var_dump($otherNumber);
print('Type: ' . gettype($otherNumber) . PHP_EOL);
print("As string: {$otherNumber}\n\n");
