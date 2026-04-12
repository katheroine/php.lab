<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $publicProperty = 'public';
    static $staticProperty = 'static';
    readonly string $readonlyProperty;
    final $finalProperty = 'final';

    function __construct()
    {
        $this->readonlyProperty = 'readonly';
    }
}

$someObject = new SomeClass();

print(
    $someObject->publicProperty . PHP_EOL
    . SomeClass::$staticProperty . PHP_EOL
    . $someObject->readonlyProperty . PHP_EOL
    . $someObject->finalProperty . PHP_EOL
);
