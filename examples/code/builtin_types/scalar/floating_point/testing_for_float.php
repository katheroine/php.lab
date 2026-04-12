<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someValue = 10.0;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is float? ' . (is_float($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is float? ' . (is_double($someValue) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is float? ' . (is_float($someNumber) ? 'yes' : 'no') . PHP_EOL);
print('Is float? ' . (is_double($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
