<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 1024
    ) {
    }
}

$someObject = new SomeClass('hello', 15.5);

print("Some object:\n\n");
var_dump($someObject);
print(PHP_EOL);
print_r($someObject);
print(PHP_EOL);
