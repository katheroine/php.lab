<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

class OtherClass
{
    readonly mixed $otherReadonlyProperty;

    function initialiseReadonlyProperty(int $value)
    {
        $this->otherReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
$otherObject->initialiseReadonlyProperty(64);
print($otherObject->otherReadonlyProperty . PHP_EOL);
