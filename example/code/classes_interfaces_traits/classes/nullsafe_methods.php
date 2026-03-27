<?php

class SomeClass
{
    private $empty;

    public function someMethod()
    {
        if ($this->empty) {
            return null;
        }

        return new OtherClass();
    }

    public function __construct($empty)
    {
        $this->empty = $empty;
    }
}

class OtherClass
{
    public function otherMethod()
    {
        return 'vanilla';
    }
}

function someFunction($emptyResult, $emptyMethod)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyMethod);
}

$result = someFunction(true, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);
