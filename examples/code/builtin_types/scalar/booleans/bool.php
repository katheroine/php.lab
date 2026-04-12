<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
