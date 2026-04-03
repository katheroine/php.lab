<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someText = 'rabbit';

print('Type of text: ' . gettype($someText) . PHP_EOL);
print('Is string? ' . (is_string($someText) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someNumber = 10;

print('Type of number: ' . gettype($someNumber) . PHP_EOL);
print('Is string? ' . (is_string($someNumber) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
