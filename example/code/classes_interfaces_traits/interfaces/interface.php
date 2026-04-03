<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';

    public static function someStaticMethod(): string;
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }

    public function someMethod(): string
    {
        return 'method';
    }
}

$someObject = new SomeClass();
print(
    SomeClass::SOME_CONSTANT . PHP_EOL
    . $someObject->someStaticMethod() . PHP_EOL
    . $someObject->someMethod() . PHP_EOL
);
