<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public static string $someStaticProperty = 'static property';
}

class SomeClass
{
    use SomeTrait;

    public static function someStaticMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }

    public function someMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }
}

print(SomeTrait::$someStaticProperty . PHP_EOL);
print(SomeClass::$someStaticProperty . PHP_EOL);
$someObject = new SomeClass();
$someObject->someMethod();
