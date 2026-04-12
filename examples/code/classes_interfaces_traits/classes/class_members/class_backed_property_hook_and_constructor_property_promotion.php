<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function __construct(
        public string $someProperty = '' {
            set(string $property) {
                $this->someProperty = '<' . $property . '>';
            }
            get {
                return trim($this->someProperty, '<>');
            }
        }
    ) {
    }
}

$someObject = new SomeClass('mango');

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);
