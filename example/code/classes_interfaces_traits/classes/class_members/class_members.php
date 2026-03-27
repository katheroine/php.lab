<?php

class SomeClass
{
    public const SOME_CONSTANT = 'apple';

    public $someProperty = 'orange';

    public function someMethod()
    {
        return 'strawberry';
    }
}

$someObject = new SomeClass();

print('Statically accessed constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
print('Dynamically called method result: ' . $someObject->someMethod() . PHP_EOL);
