<?php

interface SomeInterface
{
    public const SOME_CLASS_CONSTANT = 'lalala';

    public static function someClassFunction(): void;
    public function someObjectFunction(): void;
}

interface AnotherInterface extends SomeInterface
{
    public function anotherFunction(): string;
}

class SomeClass implements AnotherInterface
{
    public static function someClassFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }

    public function someObjectFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }

    public function anotherFunction(): string
    {
        return "Hi, there!";
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

print($someObject->anotherFunction() . PHP_EOL);
