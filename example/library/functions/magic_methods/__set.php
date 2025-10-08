<?php

class SomeClass
{
    public function __set(string $argumentName, mixed $argumentValue): void
    {
        print(
            "Magic method __set\n"
            . "Argument name: {$argumentName}\n"
            . "Argument value: {$argumentValue}\n"
        );
    }
}

$someObject = new SomeClass();
$someObject->variable = "hello";
