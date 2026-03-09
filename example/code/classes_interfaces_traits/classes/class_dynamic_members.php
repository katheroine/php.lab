<?php

class SomeClass
{
    public $someProperty = 'orange';

    public function someMethod()
    {
        return 'strawberry';
    }
}

$someObject = new SomeClass();

print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
print('Dynamically called method result: ' . $someObject->someMethod() . PHP_EOL);
