<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public $someProperty = 'betroot';
}

$someObject = new SomeClass();

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

$someVariable = $someObject;

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

$someReference = &$someObject;

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

$someClone = clone $someObject;

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Change of variable\n\n");

$someVariable->someProperty = 'carrot';

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of reference\n\n");

$someReference->someProperty = 'parsley';

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of clone\n\n");

$someClone->someProperty = 'radish';

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);
