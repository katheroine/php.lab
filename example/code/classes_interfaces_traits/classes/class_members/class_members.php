<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    const SOME_CONSTANT = 'apple';

    public $someProperty = 'orange';

    public function someMethod()
    {
        return 'strawberry';
    }
}

$someObject = new SomeClass();

print('Statically accessed constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
print('Dynamically called method result: ' . $someObject->someMethod() . PHP_EOL);
