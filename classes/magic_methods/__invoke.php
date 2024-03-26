<?php

class SomeClass
{
    public function __invoke(mixed $argument1, mixed $argument2): void
    {
        print(
            "Magic method __invoke\n"
            . "Method arguments: \n"
            . $argument1 . PHP_EOL
            . $argument2 . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject(4, "hello");
