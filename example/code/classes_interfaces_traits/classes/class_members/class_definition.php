<?php

class SomeClass
{
    public $someProperty;
    public $otherProperty;

    public function someMethod()
    {
        return "{$this->someProperty} & {$this->otherProperty}";
    }
}

class OtherClass
{
    public int $someNumber;
    public float $someValue;
    public string $someText;

    public function someMethod(int $number, float $value): string
    {
        $this->someNumber = $number;
        $this->someValue = $value;
        $this->someText = (string) ($number * $value);

        return $this->someText;
    }

    public function otherMethod(): float
    {
        return $this->someNumber * $this->someValue;
    }
}

$someObject = new SomeClass();
$someObject->someProperty = 256;
$someObject->otherProperty = 'tomato';
$result = $someObject->someMethod();

print($result . PHP_EOL);

$otherObject = new OtherClass();
$result = $otherObject->someMethod(3, 1.5);

print($result . PHP_EOL);
print($otherObject->otherMethod() . PHP_EOL);
