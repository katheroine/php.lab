<?php

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';

    public static function someStaticMethod(): string;
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }

    public function someMethod(): string
    {
        return 'method';
    }
}

$someObject = new SomeClass();
print(
    SomeClass::SOME_CONSTANT . PHP_EOL
    . $someObject->someStaticMethod() . PHP_EOL
    . $someObject->someMethod() . PHP_EOL
);
