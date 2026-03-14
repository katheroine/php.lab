<?php

class SomeClass
{
    public static $number;

    static function someClassFunction()
    {
        printf("Number: %d\n", self::$number);

        self::$number++;
    }

    function someObjectFunction()
    {
        printf("Number: %d\n", self::$number);

        self::$number++;
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

$anotherObject = new SomeClass();
$anotherObject->someObjectFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
}

SomeSubclass::someClassFunction();

$someSubobject = new SomeSubclass();
$someSubobject->someObjectFunction();

$anotherSubobject = new SomeSubclass();
$anotherSubobject->someObjectFunction();
