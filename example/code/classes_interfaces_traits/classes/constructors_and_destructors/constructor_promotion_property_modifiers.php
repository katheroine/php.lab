<?php

class SomeClass
{
    public function __construct(
        public string $someProperty,
        public readonly float $otherProperty = 10.0,
    ) {
    }
}

$someObject = new SomeClass("hello");

var_dump($someObject);
print(PHP_EOL);

print(
    $someObject->someProperty . PHP_EOL
    . $someObject->otherProperty . PHP_EOL
    . PHP_EOL
);
