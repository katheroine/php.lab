<?php

trait SomeTrait
{
    public $someVariable = 'hello';

    public abstract function someAbstractMethod(string $someParameter): string;

    public function someMothod(): void
    {
        print($this->someAbstractMethod($this->someVariable));
    }
}

class SomeClass
{
    use SomeTrait;

    public function someAbstractMethod(string $someParameter): string
    {
        return ucfirst($someParameter) . ' world!' . PHP_EOL;
    }
}

$someObject = new SomeClass();
$someObject->someMothod();
