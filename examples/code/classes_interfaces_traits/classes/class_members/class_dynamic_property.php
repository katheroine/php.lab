<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 1;
}

$someObject = new SomeClass();

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = 2;
$someObject->otherDynamicProperty = 3;

print_r($someObject);
print(PHP_EOL);
