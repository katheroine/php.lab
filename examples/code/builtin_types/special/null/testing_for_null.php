<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someNothing = null;

print('Type of nothing: ' . gettype($someNothing) . PHP_EOL);
print('Is null? ' . (is_null($someNothing) ? 'yes' : 'no') . PHP_EOL);
print('Is null? ' . (($someNothing === null) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

$someValue = 10;

print('Type of value: ' . gettype($someValue) . PHP_EOL);
print('Is null? ' . (is_null($someValue) ? 'yes' : 'no') . PHP_EOL);
print('Is null? ' . (($someValue === null) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);
