<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public static function display()
    {
        print("Hello, there!\n");
    }

    public function method()
    {
        self::display();
        static::display();
    }
}

class OtherClass extends SomeClass
{
    public static function display()
    {
        print("Hello, here!\n");
    }
}

$someObject = new OtherClass();
$someObject->method();
