<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

abstract class OtherClass
{
    readonly mixed $otherReadonlyProperty;
}

class AnotherClass extends OtherClass
{
    function __construct(int $value = 64)
    {
        $this->otherReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(64);
print($someObject->someReadonlyProperty . PHP_EOL);

$anotherObject = new AnotherClass();
print($anotherObject->otherReadonlyProperty . PHP_EOL);
