<?php

class SomeClass
{
    public function __unset(string $propertyName): void
    {
        print(
            "Magic method __unset\n"
            . "Property name: $propertyName\n"
        );
    }
}

$someObject = new SomeClass();
unset($someObject->property);