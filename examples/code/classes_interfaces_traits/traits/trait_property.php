<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public string $someProperty = 'property';
}

class SomeClass
{
    use SomeTrait;

    public function someMethod(): void
    {
        print($this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someProperty . PHP_EOL);
$someObject->someMethod();
