<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

global $oddValues, $evenValues;

$oddValues = [1, 3, 5];
$evenValues = [2, 4, 6];

function someGenerator()
{
    global $oddValues, $evenValues;

    yield from [0];
    yield from $oddValues;
    yield from $evenValues;
}

foreach (someGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);
