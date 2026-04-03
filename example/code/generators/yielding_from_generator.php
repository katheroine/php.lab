<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function oddValuesGenerator(int $number)
{
    $value = -1;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value;
    }
}

function evenValueGenerator(int $number)
{
    $value = 0;

    for($i = 0; $i < $number; $i++) {
        $value += 2;
        yield $value;
    }
}

function someGenerator(int $number)
{
    yield 0;
    yield from oddValuesGenerator($number);
    yield from evenValueGenerator($number);
}

foreach (someGenerator(3) as $value) {
    print($value . ' ');
}

print(PHP_EOL);
