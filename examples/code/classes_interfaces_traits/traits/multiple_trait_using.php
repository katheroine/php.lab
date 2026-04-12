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
        return 'per speculum';
    }
}

trait OtherTrait
{
    public function otherMethod(): string
    {
        return 'in aenigmate';
    }
}

class SomeClass
{
    use SomeTrait, OtherTrait;

    public function anotherMethod(): string
    {
        return
            'Videmus nunc ' . $this->someMethod()
            . ' et ' . $this->otherMethod() . '.';
    }
}

$someObject = new SomeClass();
print('Traits:' . PHP_EOL);
print_r(class_uses($someObject));
print('Some trait method result: ' . $someObject->someMethod() . PHP_EOL);
print('Other trait method result: ' . $someObject->otherMethod() . PHP_EOL);

print(PHP_EOL . $someObject->anotherMethod() . PHP_EOL);
