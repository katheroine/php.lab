<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
}

class OtherClass
{
    private(set) string $someProperty;

    function __construct(string $someValue)
    {
        $this->someProperty = $someValue;
    }
}

$someObject = new SomeClass;

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new OtherClass('onion');

print("Another object\n");
var_dump($anotherObject);
print("Initialied property: {$anotherObject->someProperty}\n");
print(PHP_EOL);
