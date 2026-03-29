<?php

interface SomeInterface
{
    public function someMethod(): string;
}

interface OtherInterface
{
    public function otherMethod(): string;
}

class SomeClass implements SomeInterface, OtherInterface
{
    public function someMethod(): string
    {
        return 'some method';
    }

    public function otherMethod(): string
    {
        return 'other method';
    }
}

$someObject = new SomeClass();
print('Interfaces:' . PHP_EOL);
print_r(class_implements($someObject));
print('Some interface method result: ' . $someObject->someMethod() . PHP_EOL);
print('Other interface method result: ' . $someObject->otherMethod() . PHP_EOL);
