<?php

class SomeClass
{
    public $someProperty = null;

    public function __construct($empty)
    {
        if (! $empty) {
            $this->someProperty = new OtherClass();
        }
    }
}

class OtherClass
{
    public $otherProperty = 'vanilla';
}

function someFunction($emptyResult, $emptyProperty)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyProperty);
}

$result = someFunction(true, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);
