<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 64;
    private $otherProperty = 'broccoli';

    function someMethod()
    {
        return $this->otherProperty;
    }

    function otherMethod($someArgument)
    {
        $this->otherProperty = $someArgument;
    }
}

$someObject = new SomeClass();

print($someObject->someProperty . PHP_EOL);
print($someObject->someMethod() . PHP_EOL . PHP_EOL);

$someObject->someProperty = 128;
$someObject->otherMethod('cauliflower');

print($someObject->someProperty . PHP_EOL);
print($someObject->someMethod() . PHP_EOL . PHP_EOL);
