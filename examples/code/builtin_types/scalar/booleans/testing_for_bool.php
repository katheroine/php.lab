<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someRight = true;

print('Type of right: ' . gettype($someRight) . PHP_EOL);
print('Is bool? ' . (is_bool($someRight) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someWrong = false;

print('Type of wrong: ' . gettype($someWrong) . PHP_EOL);
print('Is bool? ' . (is_bool($someWrong) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is bool? ' . (is_null($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
