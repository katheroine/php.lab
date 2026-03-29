<?php

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass
{
    use SomeTrait;

    public function someMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }
}

$someObject = new SomeClass();
$someObject->someMethod();
