<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
];

var_dump($someArray);
print(PHP_EOL);

$someArray[1] = 'hello';
$someArray['some_key'] = 1024;

var_dump($someArray);
print(PHP_EOL);

$someArray[] = 16;
$someArray[] = 'coffee';

var_dump($someArray);
print(PHP_EOL);

unset($someArray[2]);
unset($someArray['other_key']);

var_dump($someArray);
print(PHP_EOL);
