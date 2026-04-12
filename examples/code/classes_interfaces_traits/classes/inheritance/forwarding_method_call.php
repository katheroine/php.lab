<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public function display()
    {
        print("Hello, there!\n");
    }

    public function base()
    {
        self::display();
        static::display();
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function display()
    {
        print("Hello, here!\n");
    }

    public function derived()
    {
        parent::display();
        self::display();
        static::display();
    }
}

$someObject = new SomeDerivedClass();

$someObject->base();
print(PHP_EOL);

$someObject->derived();
print(PHP_EOL);
