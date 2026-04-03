<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someArray =  [null, true, 2, 3.14, 'orange'];
$otherArray = [0, true, 2, 3.14, 'blue', 'hello'];

$rightDifference = array_diff($someArray, $otherArray);
$leftDifference = array_diff($otherArray, $someArray);

print("Difference:\n\n");

print_r($rightDifference);
print(PHP_EOL);

print_r($leftDifference);
print(PHP_EOL);
