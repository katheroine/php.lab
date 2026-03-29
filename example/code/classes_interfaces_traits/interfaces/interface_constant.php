<?php

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass implements SomeInterface
{
    public function someMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }
}

print(SomeInterface::SOME_CONSTANT . PHP_EOL);

$someObject = new SomeClass();
$someObject->someMethod();
