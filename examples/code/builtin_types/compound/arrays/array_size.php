<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$numbers = [9, 7, 5];
$values = [9.5, 8.5, 7.5, 3.3, 2.0];

// sizeof is an alias of count

$size = sizeof($numbers);
$count = count($numbers);
print("Length of numbers: {$size} (the same: {$count})\n");

$size = sizeof($values);
$count = count($values);
print("Length of values: {$size} (the same: {$count})\n");
