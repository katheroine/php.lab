<?php

class SomeClass
{
    public $variable;

    public static function __set_state(array $properties): object
    {
        print(
            "Magic method __set_state\n"
            . "Properties: "
        );
        var_dump($properties);

        return (object) [];
    }
}

$someObject = new SomeClass();
var_export($someObject);

print(PHP_EOL);
