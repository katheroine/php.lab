<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'method';
    }
}

class SomeClass
{
    use SomeTrait;

    public function otherMethod(): void
    {
        print(
            self::someMethod() . PHP_EOL
            . $this->someMethod() . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->otherMethod();
