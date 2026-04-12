<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private $empty;

    public function someMethod()
    {
        if ($this->empty) {
            return null;
        }

        return new OtherClass();
    }

    function __construct($empty)
    {
        $this->empty = $empty;
    }
}

class OtherClass
{
    public function otherMethod()
    {
        return 'vanilla';
    }
}

function someFunction($emptyResult, $emptyMethod)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyMethod);
}

$result = someFunction(true, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);
