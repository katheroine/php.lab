<?php

class SomeClass
{
    final public const SOME_CONST = 'lalala';

    public static function someClassFunction(): void
    {
        print("Base class: extendable\n");
    }

    public function someObjectFunction(): void
    {
        print("Base class object: extendable\n");
    }

    final public static function someUnextendableClassFunction(): void
    {
        print("Base class: unextendable\n");
    }

    final public function someUnextendableObjectFunction(): void
    {
        print("Base class object: unextendable\n");
    }
}

SomeClass::someClassFunction();
SomeClass::someUnextendableClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();
$someObject->someUnextendableObjectFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
    // final public const SOME_CONST = 'nanana';

    public static function someClassFunction(): void
    {
        print("Sublass: extendable\n");
    }

    public function someObjectFunction(): void
    {
        print("Subclass object: extendable\n");
    }

    // final public static function someUnextendableClassFunction(): void
    // {
    //     print("Subclass: unextendable\n");
    // }

    // final public function someUnextendableObjectFunction(): void
    // {
    //     print("Subclass object: unextendable\n");
    // }
}

SomeSubclass::someClassFunction();

$someSubobject = new SomeSubclass();
$someSubobject->someObjectFunction();

print(PHP_EOL);

final class SomeUnextendableClass
{
    public static function someClassFunction(): void
    {
        print("Unextendable class\n");
    }

    public function someObjectFunction(): void
    {
        print("Unextendable class object\n");
    }
}

SomeUnextendableClass::someClassFunction();

$anotherObject = new SomeUnextendableClass();
$anotherObject->someObjectFunction();

print(PHP_EOL);

// class AnotherSubclass extends SomeUnextendableClass
// {
// }
