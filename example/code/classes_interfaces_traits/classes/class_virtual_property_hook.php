<?php

class SomeClass
{
    public string $someProperty = 'grapes';
    public string $otherProperty {
        get {
            return 'sweet ' . $this->someProperty;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);
