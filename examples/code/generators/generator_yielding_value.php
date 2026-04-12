<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function oneValueGenerator()
{
    yield 1;
}

foreach (oneValueGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);

function limitedValuesGenerator()
{
    yield 1;
    yield 3;
    yield 5;
}

foreach (limitedValuesGenerator() as $value) {
    print($value . ' ');
}

print(PHP_EOL);

function unlimitedValuesGenerator()
{
    $value = 0;

    while(true) {
        yield $value++;
    }
}

$anchor = unlimitedValuesGenerator();

print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');
$anchor->next();
print($anchor->current() . ' ');

print(PHP_EOL);
