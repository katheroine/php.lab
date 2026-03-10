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

$someReadonlyObject = new SomeReadonlyClass();

print("Some property: {$someReadonlyObject->someProperty}\n");
print("Some readonly property: {$someReadonlyObject->otherProperty}\n");
