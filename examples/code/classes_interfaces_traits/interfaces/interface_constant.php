<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass implements SomeInterface
{
    public function someMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }
}

print(SomeInterface::SOME_CONSTANT . PHP_EOL);

$someObject = new SomeClass();
$someObject->someMethod();
