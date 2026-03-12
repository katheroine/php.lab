<?php

class SomeClass
{
    public $someProperty = 1;
}

$someObject = new SomeClass();

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = 2;
$someObject->otherDynamicProperty = 3;

print_r($someObject);
print(PHP_EOL);
