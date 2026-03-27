<?php

class SomeClass
{
    public readonly mixed $someReadonlyProperty;

    public function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

abstract class OtherClass
{
    public readonly mixed $otherReadonlyProperty;
}

class AnotherClass extends OtherClass
{
    public function __construct(int $value = 64)
    {
        $this->otherReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(64);
print($someObject->someReadonlyProperty . PHP_EOL);

$anotherObject = new AnotherClass();
print($anotherObject->otherReadonlyProperty . PHP_EOL);
