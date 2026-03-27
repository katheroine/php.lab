<?php

class SomeClass
{
    public readonly mixed $someReadonlyProperty;

    public function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);

print($someObject->someReadonlyProperty . PHP_EOL);
