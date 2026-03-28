<?php

abstract class SomeAbstractClass
{
    abstract protected function process(float $value1, float $value2): float;

    public function someMethod(float $value1, float $value2): void
    {
        print('Result: ' . $this->process($value1, $value2) . PHP_EOL);
    }
}

class SomeClass extends SomeAbstractClass
{
    protected function process(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }
}

class OtherClass extends SomeAbstractClass
{
    protected function process(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }
}

$someObject = new SomeClass();
$someObject->someMethod(2, 3);

$otherObject = new OtherClass();
$otherObject->someMethod(2, 3);
