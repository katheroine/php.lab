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

interface OtherInterface
{
    public function otherMethod(): string;
}

class SomeClass implements SomeInterface, OtherInterface
{
    public function someMethod(): string
    {
        return 'per speculum';
    }

    public function otherMethod(): string
    {
        return 'in aenigmate';
    }

    public function anotherMethod(): string
    {
        return
            'Videmus nunc ' . $this->someMethod()
            . ' et ' . $this->otherMethod() . '.';
    }
}

$someObject = new SomeClass();
print('Interfaces:' . PHP_EOL);
print_r(class_implements($someObject));
print('Some interface method result: ' . $someObject->someMethod() . PHP_EOL);
print('Other interface method result: ' . $someObject->otherMethod() . PHP_EOL);

print(PHP_EOL . $someObject->anotherMethod() . PHP_EOL);
