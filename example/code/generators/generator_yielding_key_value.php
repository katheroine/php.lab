<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function oneValueGenerator()
{
    yield 1 => 1;
}

foreach (oneValueGenerator() as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);

function limitedValuesGenerator()
{
    yield 'one' => 1;
    yield 'three' => 3;
    yield 'five' => 5;
}

foreach (limitedValuesGenerator() as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);

function unlimitedValuesGenerator()
{
    $key = 0;
    $value = 0;

    while(true) {
        yield $key-- => $value++;
    }
}

$anchor = unlimitedValuesGenerator();

print($anchor->key() . ': ' . $anchor->current() . '; ');
$anchor->next();
print($anchor->key() . ': ' . $anchor->current() . '; ');
$anchor->next();
print($anchor->key() . ': ' . $anchor->current() . '; ');
$anchor->next();
print($anchor->key() . ': ' . $anchor->current() . '; ');
$anchor->next();
print($anchor->key() . ': ' . $anchor->current() . '; ');

print(PHP_EOL);
