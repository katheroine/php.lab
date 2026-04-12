<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someObject = (object) [
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$otherObject = new SomeClass();

print("Information:\n");
var_dump($someObject);
print('Type: ' . gettype($someObject) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($otherObject);
print('Type: ' . gettype($otherObject) . PHP_EOL . PHP_EOL);
