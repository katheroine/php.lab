<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 'lemon';

    public static function someStaticMethod()
    {
        print("Inside static method.\n\n");
    }

    public function someMethod()
    {
        print("Inside method:\n\n");
        print('Property value: ' . $this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();

print("Outside class:\n\n");
print('Property value: ' . $someObject->someProperty . PHP_EOL . PHP_EOL);
print("Static method call:\n\n");
$someObject->someStaticMethod();
print("Method call:\n\n");
$someObject->someMethod();
