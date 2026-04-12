<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 'watermelon';
    private $otherProperty = 'pumpkin';

    function someMethod()
    {
        return $this->otherProperty;
    }
}

$value = (new SomeClass())->someProperty;

print($value . PHP_EOL);

$value = (new SomeClass())->someMethod();

print($value . PHP_EOL);
