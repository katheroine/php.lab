<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public static $number;

    static function someClassFunction()
    {
        printf("Number: %d\n", self::$number);

        self::$number++;
    }

    function someObjectFunction()
    {
        printf("Number: %d\n", self::$number);

        self::$number++;
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

$anotherObject = new SomeClass();
$anotherObject->someObjectFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
}

SomeSubclass::someClassFunction();

$someSubobject = new SomeSubclass();
$someSubobject->someObjectFunction();

$anotherSubobject = new SomeSubclass();
$anotherSubobject->someObjectFunction();
