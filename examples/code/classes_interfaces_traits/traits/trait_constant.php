<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass
{
    use SomeTrait;

    public static function someStaticMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }

    public function someMethod(): void
    {
        print(
            self::SOME_CONSTANT . PHP_EOL
            . $this::SOME_CONSTANT . PHP_EOL
        );
    }
}

print(SomeClass::SOME_CONSTANT . PHP_EOL);
$someObject = new SomeClass();
print($someObject::SOME_CONSTANT . PHP_EOL);
$someObject->someStaticMethod();
$someObject->someMethod();
