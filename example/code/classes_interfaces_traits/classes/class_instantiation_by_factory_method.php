<?php

class SomeClass
{
    public static function create()
    {
        return new static();
    }

    private function __construct()
    {
    }
}

$someObject = SomeClass::create();

print("Object:\n");
var_dump($someObject);
print(PHP_EOL);
