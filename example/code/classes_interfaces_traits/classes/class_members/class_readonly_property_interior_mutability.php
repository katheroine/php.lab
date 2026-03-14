<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;
    readonly mixed $otherReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = (object) [
            'interior' => $value
        ];;
    }
}

$someObject = new SomeClass(32);

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);

$someObject->someReadonlyProperty->interior = 64;

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);
