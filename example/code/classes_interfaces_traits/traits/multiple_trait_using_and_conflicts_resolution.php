<?php

trait SomeTrait
{
    public const string SOME_CONSTANT = 'constant';
    public string $someProperty = 'property';

    public function someMethod(): void
    {
        print('some trait: ' . __METHOD__ . PHP_EOL);
    }

    public function otherMethod(): void
    {
        print('some trait: ' . __METHOD__ . PHP_EOL);
    }
}

trait OtherTrait
{
    public const string SOME_CONSTANT = 'constant';
    public string $someProperty = 'property';

    public function someMethod(): void
    {
        print('other trait: ' . __METHOD__ . PHP_EOL);
    }

    public function otherMethod(): void
    {
        print('other trait: ' . __METHOD__ . PHP_EOL);
    }
}

class SomeClass
{
    use SomeTrait, OtherTrait
    {
        SomeTrait::someMethod insteadof OtherTrait;
        OtherTrait::otherMethod insteadOf SomeTrait;
        OtherTrait::someMethod as firstMethod;
        SomeTrait::otherMethod as secondMethod;
    }
}

$someObject = new SomeClass();

print($someObject::SOME_CONSTANT . PHP_EOL);
print($someObject->someProperty . PHP_EOL);

print(PHP_EOL);

$someObject->someMethod();
$someObject->otherMethod();
$someObject->firstMethod();
$someObject->secondMethod();

print(PHP_EOL);
