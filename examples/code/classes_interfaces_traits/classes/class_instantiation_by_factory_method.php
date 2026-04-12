<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    static function create()
    {
        return new static();
    }

    private function __construct()
    {
    }
}

$someObject = SomeClass::create();

print("Object:\n");
var_dump($someObject);
print(PHP_EOL);
