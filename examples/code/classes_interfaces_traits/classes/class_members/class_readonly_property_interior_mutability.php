<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    readonly mixed $someReadonlyProperty;
    readonly mixed $otherReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = (object) [
            'interior' => $value
        ];;
    }
}

$someObject = new SomeClass(32);

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);

$someObject->someReadonlyProperty->interior = 64;

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);
