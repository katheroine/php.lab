<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 'lemon';
}

$someObject = new SomeClass();

print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
