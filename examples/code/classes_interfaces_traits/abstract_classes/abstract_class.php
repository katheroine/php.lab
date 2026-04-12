<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

abstract class SomeAbstractClass
{
    private const string SOME_CONSTANT = 'constant';
    protected string $someProperty = 'property';

    public function someMethod(): void
    {
        print(
            $this->getLabel(static::class) . ': ' . PHP_EOL
            . self::SOME_CONSTANT . PHP_EOL
            . $this->someProperty . PHP_EOL
        );
    }

    abstract protected function getLabel(string $name): string;
}

class SomeClass extends SomeAbstractClass
{
    protected function getLabel(string $name): string
    {
        return "The content of the {$name}";
    }
}

$someObject = new SomeClass();
$someObject->someMethod();
