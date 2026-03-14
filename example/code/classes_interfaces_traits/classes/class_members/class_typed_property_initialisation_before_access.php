<?php

class SomeClass
{
    public $untypedProperty;
    public string $typedProperty = 'initialised';
}

$someObject = new SomeClass();

print('Untyped: ' . $someObject->untypedProperty . PHP_EOL);
print('Typed:' . $someObject->typedProperty . PHP_EOL);
