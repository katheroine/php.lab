<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public static function constructByStatic()
    {
        return new static();
    }

    public static function constructBySelf()
    {
        return new self();
    }
}

class OtherClass extends SomeClass
{
    static function constructByParent()
    {
        return new parent();
    }
}

$someObject = new SomeClass();

print("# From the explicit class name:\n\n");
print('Created object class: '. get_class($someObject) . PHP_EOL . PHP_EOL);

$fromObject = new $someObject;

print("# From an object of the particular class:\n\n");
print(
    'Original object class: ' . get_class($someObject) . PHP_EOL
    . 'Created object class: ' . get_class($fromObject) . PHP_EOL
    . PHP_EOL
);
print("Equal:\n");
var_dump($fromObject == $someObject);
print("Identical:\n");
var_dump($fromObject === $someObject);
print(PHP_EOL);

$className = 'SomeClass';
$fromString = new $className();

print("# From a string containing the particular class name:\n\n");
print('Created object class: '. get_class($fromString) . PHP_EOL . PHP_EOL);

function getClassName(): string
{
    return 'SomeClass';
}

$fromExpression = new (getClassName());

print("# From an expression which value contains the particular class name:\n\n");
print('Created object class: '. get_class($fromExpression) . PHP_EOL . PHP_EOL);

$fromClassNameResolution = new (SomeClass::class);

print("# From the particular class name resolution:\n\n");
print('Created object class: '. get_class($fromClassNameResolution) . PHP_EOL . PHP_EOL);

$byStatic = SomeClass::constructByStatic();
$bySelf = SomeClass::constructBySelf();
$byParent = OtherClass::constructByParent();

print("# From a factory method of the particular class:\n\n");
print(
    'By static: ' . get_class($byStatic) . PHP_EOL
    . 'By self: ' . get_class($bySelf) . PHP_EOL
    . 'By parent: ' . get_class($byParent) . PHP_EOL
    . PHP_EOL
);
