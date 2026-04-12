<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . SomeClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . PHP_EOL
);
