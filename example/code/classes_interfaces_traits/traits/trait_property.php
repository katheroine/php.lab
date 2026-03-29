<?php

trait SomeTrait
{
    public string $someProperty = 'property';
}

class SomeClass
{
    use SomeTrait;

    public function someMethod(): void
    {
        print($this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someProperty . PHP_EOL);
$someObject->someMethod();
