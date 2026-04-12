<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class BaseClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    static function someStaticMethod()
    {
        return 'kiwi';
    }

    function someMethod()
    {
        return 'melon';
    }

    function otherMethod()
    {
        return 'watermelon';
    }

    function anotherMethod()
    {
        return 'avocado';
    }
}

class DerivedClass extends BaseClass
{
    public const OTHER_CONSTANT = 'potato';
    public static $otherStaticProperty = 'tomato';
    public $otherProperty = 'cucumber';

    function otherMethod()
    {
        return 'radish';
    }

    function anotherMethod()
    {
        return parent::anotherMethod();
    }
}

$someObject = new BaseClass();

print("Base class:\n\n");
print('Some constant: ' . BaseClass::SOME_CONSTANT . PHP_EOL);
print('Some static property: ' . BaseClass::$someStaticProperty . PHP_EOL);
print("Some property: {$someObject->someProperty}\n");
print(PHP_EOL);
print("Some method result: {$someObject->someMethod()}\n");
print("Other method result: {$someObject->otherMethod()}\n");
print("Another method result: {$someObject->anotherMethod()}\n");
print(PHP_EOL);

$otherObject = new DerivedClass();

print("Derived class:\n\n");
print('Some constant: ' . DerivedClass::SOME_CONSTANT . PHP_EOL);
print('Some static property: ' . DerivedClass::$someStaticProperty . PHP_EOL);
print("Some property: {$otherObject->someProperty}\n");
print(PHP_EOL);
print('Other constant: ' . DerivedClass::OTHER_CONSTANT . PHP_EOL);
print('Other static property: ' . DerivedClass::$otherStaticProperty . PHP_EOL);
print("Some property: {$otherObject->otherProperty}\n");
print(PHP_EOL);
print("Some method result: {$otherObject->someMethod()}\n");
print("Other method result: {$otherObject->otherMethod()}\n");
print("Another method result: {$otherObject->anotherMethod()}\n");
print(PHP_EOL);
