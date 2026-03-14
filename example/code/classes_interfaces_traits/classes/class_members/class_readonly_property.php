<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);

print($someObject->someReadonlyProperty . PHP_EOL);
