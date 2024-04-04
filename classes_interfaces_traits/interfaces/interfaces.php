<?php

interface SomeInterface
{
    public const SOME_CLASS_CONSTANT = 'lalala';

    public static function someClassFunction(): void;
    public function someObjectFunction(): void;
    // private function someNonpublicFunction(): void;
}

class SomeClass implements SomeInterface
{
    public static function someClassFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }

    public function someObjectFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();
