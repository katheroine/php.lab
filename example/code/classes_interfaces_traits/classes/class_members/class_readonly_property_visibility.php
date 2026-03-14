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
    function __construct(int $value = 64)
    {
        $this->someReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
print($otherObject->someReadonlyProperty . PHP_EOL);
