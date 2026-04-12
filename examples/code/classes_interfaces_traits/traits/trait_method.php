<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'method';
    }
}

class SomeClass
{
    use SomeTrait;

    public function otherMethod(): void
    {
        print(
            self::someMethod() . PHP_EOL
            . $this->someMethod() . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
print($someObject->someMethod() . PHP_EOL);
$someObject->otherMethod();
