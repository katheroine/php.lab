<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public function __construct(
        public $publicProperty,
        protected $protectedProperty = 15.5,
        private $privateProperty = 'hello',
    ) {
    }
}

$someObject = new SomeClass(1, 2.5);

print("Information:\n");
var_dump($someObject);
print('Type: ' . gettype($someObject) . PHP_EOL . PHP_EOL);

print("Public property: {$someObject->publicProperty}\n");
$someObject->publicProperty = 3;
print("Public property: {$someObject->publicProperty}\n");
var_dump($someObject);
print(PHP_EOL);
