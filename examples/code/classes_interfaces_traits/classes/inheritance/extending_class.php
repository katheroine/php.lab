<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $someProperty = 'base';
}

class OtherClass extends SomeClass
{
    public string $otherProperty = 'derived';
}

$someObject = new OtherClass();

print('Class: ' . get_class($someObject) . PHP_EOL);
print('Base class: ' . get_parent_class($someObject) . PHP_EOL);
print("Base class property: {$someObject->someProperty}\n");
print("Derived class property: {$someObject->otherProperty}\n");
