<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
