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
    public function __construct(int $value = 64)
    {
        $this->someReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
print($otherObject->someReadonlyProperty . PHP_EOL);
