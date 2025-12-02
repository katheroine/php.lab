<?php

class SomeClass
{
    function __construct(
        public $someProperty,
        public string $otherProperty,
        readonly float $anotherProperty = 10.0
    ) {
    }
}

$someObject = new SomeClass(4, "hello");

print($someObject->someProperty . PHP_EOL);
print($someObject->otherProperty . PHP_EOL);
print($someObject->anotherProperty . PHP_EOL);
