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

    public static function someStaticMethod()
    {
        print("Inside static method:\n\n");
        print('Constant value (accessed by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Constant value (accessed by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Static property value (accessed by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Static property value (accessed by static): ' . static::$someStaticProperty . PHP_EOL);
    }
}

print("Outside class:\n\n");
print('Constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Static property value: ' . SomeClass::$someStaticProperty . PHP_EOL . PHP_EOL);
print("Static method call:\n\n");
SomeClass::someStaticMethod();
