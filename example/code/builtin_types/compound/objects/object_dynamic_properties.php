<?php

class SomeClass
{
    public $someProperty = 1;
}

$someObject = new SomeClass();
print("Some object:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->otherProperty = 2;
$someObject->anotherProperty = 3;

print_r($someObject);
print(PHP_EOL);
