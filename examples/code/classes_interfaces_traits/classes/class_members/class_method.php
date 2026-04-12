<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    public function someMethod()
    {
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();

print("Method dynamic call:\n");
$someObject->someMethod();
