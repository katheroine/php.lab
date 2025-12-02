<?php

trait SomeTrait
{
    public const SOME_CLASS_CONSTANT = 'lalala';

    public static function someClassFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }

    public function someObjectFunction(): void
    {
        print(self::SOME_CLASS_CONSTANT . PHP_EOL);
    }
}

trait AnotherTrait
{
    use SomeTrait;

    public function anotherFunction(): string
    {
        return "Hi, there!";
    }
}

class SomeClass
{
    use AnotherTrait;
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

print($someObject->anotherFunction() . PHP_EOL);
