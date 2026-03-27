<?php

class SomeClass
{
    public readonly mixed $someReadonlyProperty;

    public function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

class OtherClass
{
    public readonly mixed $otherReadonlyProperty;

    public function initialiseReadonlyProperty(int $value)
    {
        $this->otherReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
$otherObject->initialiseReadonlyProperty(64);
print($otherObject->otherReadonlyProperty . PHP_EOL);
