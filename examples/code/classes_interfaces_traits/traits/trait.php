<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
    public static string $someStaticProperty = 'static property';
    public string $someProperty = 'property';
    public readonly string $someReadonlyProperty;

    public function __construct()
    {
        $this->someReadonlyProperty = 'readonly property';
    }

    public static function someStaticMethod(): string
    {
        return 'static method';
    }

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
            self::SOME_CONSTANT . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . self::someStaticMethod() . PHP_EOL
            . $this->someProperty . PHP_EOL
            . $this->someReadonlyProperty . PHP_EOL
            . $this->someMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->otherMethod();
