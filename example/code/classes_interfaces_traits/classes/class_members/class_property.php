<?php

class SomeClass
{
    public $someProperty = 'lemon';
}

$someObject = new SomeClass();

print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
