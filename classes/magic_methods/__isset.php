<?php

class SomeClass
{
    public function __isset(string $propertyName): bool
    {
        print(
            "Magic method __isset\n"
            . "Property name: $propertyName\n"
        );

        return false;
    }
}

$someObject = new SomeClass();
isset($someObject->property);
