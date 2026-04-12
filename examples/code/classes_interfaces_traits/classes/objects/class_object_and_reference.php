<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $someProperty = 'original';
}

$someObject = new SomeClass();

print_r($someObject);
print(PHP_EOL);

$otherObject = $someObject;

var_dump($otherObject);
print(PHP_EOL);

print(
    'Equal: ' . ($someObject == $otherObject ? 'yes' : 'no') . PHP_EOL
    . 'Identical: ' . ($someObject === $otherObject ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
);

$anotherObject = &$someObject;

var_dump($anotherObject);
print(PHP_EOL);

print(
    'Equal: ' . ($someObject == $anotherObject ? 'yes' : 'no') . PHP_EOL
    . 'Identical: ' . ($someObject === $anotherObject ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
);

$someObject->someProperty = 'modified';

var_dump($someObject);
print(PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);
