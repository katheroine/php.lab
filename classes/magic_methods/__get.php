<?php

class SomeClass
{
    public function __get(string $argumentName): void
    {
        print(
            "Magic method __get\n"
            . "Argument name: {$argumentName}\n"
        );
    }
}

$someObject = new SomeClass();
$someObject->variable;