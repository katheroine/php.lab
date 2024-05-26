<?php

class SomeClass
{
    public function __call(string $methodName, mixed $methodArguments): void
    {
        print(
            "Magic method __call\n"
            . "Method name: {$methodName}\n"
            . "Method arguments: "
        );
        var_dump($methodArguments);
    }
}

$someObject = new SomeClass();
$someObject->method(4, "hello");
