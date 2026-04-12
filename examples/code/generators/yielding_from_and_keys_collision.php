<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

global $oddValues;

$oddValues = ['one' => 1, 'two' => 3, 'three' => 5];

function evenValueGenerator()
{
    yield 'one' => 2;
    yield 'two' => 4;
    yield 'three' => 6;
}

function someGenerator()
{
    global $oddValues;

    yield from $oddValues;
    yield from evenValueGenerator();
}

foreach (someGenerator() as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);

$someArray = iterator_to_array(someGenerator());

foreach ($someArray as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);

$otherArray = iterator_to_array(someGenerator(), false);

foreach ($otherArray as $key => $value) {
    print($key . ': ' . $value . '; ');
}

print(PHP_EOL);
