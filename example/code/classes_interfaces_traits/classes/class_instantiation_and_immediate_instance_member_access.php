<?php

class SomeClass
{
    public $someProperty = 'watermelon';
    private $otherProperty = 'pumpkin';

    public function someMethod()
    {
        return $this->otherProperty;
    }
}

$value = (new SomeClass())->someProperty;

print($value . PHP_EOL);

$value = (new SomeClass())->someMethod();

print($value . PHP_EOL);
