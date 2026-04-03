<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = null;

    function __construct($empty)
    {
        if (! $empty) {
            $this->someProperty = new OtherClass();
        }
    }
}

class OtherClass
{
    public $otherProperty = 'vanilla';
}

function someFunction($emptyResult, $emptyProperty)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyProperty);
}

$result = someFunction(true, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);
