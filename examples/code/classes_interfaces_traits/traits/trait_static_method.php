<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }
}

class SomeClass
{
    use SomeTrait;

    public static function otherStaticMethod(): void
    {
        print(self::someStaticMethod() . PHP_EOL);
    }

    public function otherMethod(): void
    {
        print(
            self::someStaticMethod() . PHP_EOL
            . $this::someStaticMethod() . PHP_EOL
            . $this->someStaticMethod() . PHP_EOL
        );
    }
}

print(SomeTrait::someStaticMethod() . PHP_EOL);
print(SomeClass::someStaticMethod() . PHP_EOL);
$someObject = new SomeClass();
print($someObject->someStaticMethod() . PHP_EOL);
$someObject::otherStaticMethod();
$someObject->otherMethod();
