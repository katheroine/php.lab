<?php

readonly class SomeReadonlyClass
{
    public int $someProperty;
    public string $otherProperty;

    public function __construct()
    {
        $this->someProperty = 10;
        $this->otherProperty = 'magenta';
    }
}

readonly class SomeDerivedClass extends SomeReadonlyClass
{
}

$someReadonlyObject = new SomeDerivedClass();

print("Some property: {$someReadonlyObject->someProperty}\n");
print("Some readonly property: {$someReadonlyObject->otherProperty}\n");
