<?php

class SomeClass
{
    function someFunction()
    {
        static $number = 0;

        printf("Number: %d\n", $number);

        $number++;
    }
}

$someObject = new SomeClass();

$someObject->someFunction();
$someObject->someFunction();
$someObject->someFunction();

print(PHP_EOL);

$otherObject = new SomeClass();

$otherObject->someFunction();
$otherObject->someFunction();
$otherObject->someFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
}

$anotherObject = new SomeSubclass();

$anotherObject->someFunction();
$anotherObject->someFunction();
$anotherObject->someFunction();

print(PHP_EOL);
