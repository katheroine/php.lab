<?php

class SomeClass
{
    public $variable;

    public function __debugInfo(): array
    {
        print(
            "Magic method __debugInfo\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
var_dump($someObject);
