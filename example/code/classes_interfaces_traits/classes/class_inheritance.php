<?php

class BaseClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    public static function someStaticMethod()
    {
        return 'kiwi';
    }

    public function someMethod()
    {
        return 'melon';
    }

    public function otherMethod()
    {
        return 'watermelon';
    }

    public function anotherMethod()
    {
        return 'avocado';
    }
}

class DerivedClass extends BaseClass
{
    public const OTHER_CONSTANT = 'potato';
    public static $otherStaticProperty = 'tomato';
    public $otherProperty = 'cucumber';

    public function otherMethod()
    {
        return 'radish';
    }

    public function anotherMethod()
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
