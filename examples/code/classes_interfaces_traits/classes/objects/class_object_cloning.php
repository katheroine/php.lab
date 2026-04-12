<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $someRegularProperty;
    public OtherClass $someObjectProperty;

    public function __construct()
    {
        $this->someRegularProperty = 'original';
        $this->someObjectProperty = new OtherClass();
    }
}

class OtherClass
{
    public string $someProperty = 'original';
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = clone $someObject;

var_dump($otherObject);
print(PHP_EOL);

print(
    'Equal: ' . ($someObject == $otherObject ? 'yes' : 'no') . PHP_EOL
    . 'Identical: ' . ($someObject === $otherObject ? 'yes' : 'no') . PHP_EOL
    . PHP_EOL
);

$someObject->someRegularProperty = 'modified';
$someObject->someObjectProperty->someProperty = 'modified';

var_dump($someObject);
print(PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);
