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
        print("Hello, far away!\n");
    }
}

class OtherClass extends SomeClass
{
    public static function display()
    {
        print("Hello, there!\n");
    }
}

class AnotherClass extends OtherClass
{
    public static function display()
    {
        print("Hello, here!\n");
    }

    public function method()
    {
        forward_static_call(['SomeClass', 'display']);
        forward_static_call(['OtherClass', 'display']);
        forward_static_call([parent::class, 'display']);
        forward_static_call(['AnotherClass', 'display']);
        forward_static_call([self::class, 'display']);
    }
}

$someObject = new AnotherClass();
$someObject->method();
