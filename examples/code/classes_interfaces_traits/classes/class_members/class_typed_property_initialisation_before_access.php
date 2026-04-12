<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $untypedProperty;
    public string $typedProperty = 'initialised';
}

$someObject = new SomeClass();

print('Untyped: ' . $someObject->untypedProperty . PHP_EOL);
print('Typed:' . $someObject->typedProperty . PHP_EOL);
