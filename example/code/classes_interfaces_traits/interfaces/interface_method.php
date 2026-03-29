<?php

interface SomeInterface
{
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public function someMethod(): string
    {
        return 'method';
    }

    public function otherMethod(): void
    {
        print($this->someMethod() . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someMethod() . PHP_EOL);
$someObject->otherMethod();
