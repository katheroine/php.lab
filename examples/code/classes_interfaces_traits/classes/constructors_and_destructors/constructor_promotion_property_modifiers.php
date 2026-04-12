<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function __construct(
        public string $someProperty,
        readonly float $otherProperty = 10.0,
    ) {
    }
}

$someObject = new SomeClass("hello");

var_dump($someObject);
print(PHP_EOL);

print(
    $someObject->someProperty . PHP_EOL
    . $someObject->otherProperty . PHP_EOL
    . PHP_EOL
);
