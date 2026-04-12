<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public $someVariable = 'hello';

    public abstract function someAbstractMethod(string $someParameter): string;

    public function someMothod(): void
    {
        print($this->someAbstractMethod($this->someVariable));
    }
}

class SomeClass
{
    use SomeTrait;

    public function someAbstractMethod(string $someParameter): string
    {
        return ucfirst($someParameter) . ' world!' . PHP_EOL;
    }
}

$someObject = new SomeClass();
$someObject->someMothod();
