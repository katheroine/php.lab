<?php

trait SomeTrait
{
    public const SOME_CONSTANT = 'lalala';
    public string $someVariable = 'hello';

    public function someFunction(): void
    {
        print("From some trait\n\n");
    }

    public function otherFunction(): void
    {
        print("In some trait\n\n");
    }
}

trait OtherTrait
{
    // public const SOME_CONSTANT = 'nanana';
    // public string $someVariable = 'hi';

    public function someFunction(): void
    {
        print("From other trait\n\n");
    }

    public function otherFunction(): void
    {
        print("In other trait\n\n");
    }
}

class SomeClass
{
    use SomeTrait, OtherTrait
    {
        // OtherTrait::SOME_CONSTANT insteadof SomeTrait;
        SomeTrait::someFunction insteadof OtherTrait;
        OtherTrait::otherFunction insteadOf SomeTrait;
        SomeTrait::otherFunction as anotherFunction;
    }
}

print(SomeClass::SOME_CONSTANT . PHP_EOL);

print(PHP_EOL);

$someObject = new SomeClass();

print($someObject->someVariable . PHP_EOL);

print(PHP_EOL);

$someObject->someFunction();
$someObject->otherFunction();
$someObject->anotherFunction();
