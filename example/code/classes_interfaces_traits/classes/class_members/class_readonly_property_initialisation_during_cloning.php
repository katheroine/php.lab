<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }

    function __clone()
    {
        $this->someReadonlyProperty = 2;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$clonedObject = clone $someObject;
print($clonedObject->someReadonlyProperty . PHP_EOL);
