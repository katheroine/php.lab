<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

interface SomeInterface
{
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public function someMethod(): string
    {
        return 'method';
    }

    public function otherMethod(): void
    {
        print($this->someMethod() . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someMethod() . PHP_EOL);
$someObject->otherMethod();
