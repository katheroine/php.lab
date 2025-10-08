<?php

class SomeClass
{
    public static function __callStatic(string $methodName, mixed $methodArguments): void
    {
        print(
            "Magic method __callStatic\n"
            . "Method name: {$methodName}\n"
            . "Method arguments: "
        );
        var_dump($methodArguments);
    }
}

SomeClass::method(4, "hello");
