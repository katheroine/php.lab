<?php

class SomeClass
{
    public string $someRegularProperty;
    public OtherClass $someObjectProperty;

    public function __construct()
    {
        $this->someRegularProperty = 'original';
        $this->someObjectProperty = new OtherClass();
    }
}

class OtherClass
{
    public string $someProperty = 'original';
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = clone $someObject;

var_dump($otherObject);
print(PHP_EOL);

$someObject->someRegularProperty = 'modified';
$someObject->someObjectProperty->someProperty = 'modified';

var_dump($someObject);
print(PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);
