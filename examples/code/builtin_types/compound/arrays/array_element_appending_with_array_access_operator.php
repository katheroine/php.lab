<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someArray = [
    3 => 'hello',
    'key' => 'value',
    1 => 0.5,
];

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 6;

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 'star';

var_dump($someArray);
print(PHP_EOL);

unset($someArray);

$someArray[] = 16;

var_dump($someArray);
print(PHP_EOL);
