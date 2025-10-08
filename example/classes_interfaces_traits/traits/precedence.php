<?php

trait SomeTrait
{
    public const SOME_CLASS_CONSTANT = 'lalala';
    public static int $someClassVariable = 1024;
    public string $someObjectVariable = 'hello';

    public static function someClassFunction(): void
    {
        print("From trait\n\n");
    }

    public function someObjectFunction(): void
    {
        print("From trait\n\n");
    }
}

class SomeBaseClass
{
    public static function someClassFunction(): void
    {
        print("From base class\n\n");
    }

    public function someObjectFunction(): void
    {
        print("From base class\n\n");
    }
}

class SomeClass extends SomeBaseClass
{
    use SomeTrait;

    // public const SOME_CLASS_CONSTANT = 'nanana';
    // public static int $someClassVariable = 2048;
    // public string $someObjectVariable = 'hi';

    public static function someClassFunction(): void
    {
        parent::someClassFunction();
        print("From derived class\n\n");
    }

    public function someObjectFunction(): void
    {
        parent::someObjectFunction();
        print("From derived class\n\n");
    }
}

print(SomeClass::SOME_CLASS_CONSTANT . PHP_EOL);
print(SomeClass::$someClassVariable . PHP_EOL);

print(PHP_EOL);

SomeClass::someClassFunction();

$someObject = new SomeClass();

print($someObject->someObjectVariable . PHP_EOL);

print(PHP_EOL);

$someObject->someObjectFunction();
