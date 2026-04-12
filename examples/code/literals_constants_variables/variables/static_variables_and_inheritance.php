<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function someFunction()
    {
        static $number = 0;

        printf("Number: %d\n", $number);

        $number++;
    }
}

$someObject = new SomeClass();

$someObject->someFunction();
$someObject->someFunction();
$someObject->someFunction();

print(PHP_EOL);

$otherObject = new SomeClass();

$otherObject->someFunction();
$otherObject->someFunction();
$otherObject->someFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
}

$anotherObject = new SomeSubclass();

$anotherObject->someFunction();
$anotherObject->someFunction();
$anotherObject->someFunction();

print(PHP_EOL);
