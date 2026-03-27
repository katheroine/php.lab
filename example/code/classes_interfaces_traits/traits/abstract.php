<?php

trait SomeTrait
{
    public $someVariable = 'hello';

    abstract public function someObligatoryFunction(): string;

    public function someFunction(): void
    {
        print(
            $this->someVariable . $this->someObligatoryFunction()
        );
    }
}

class SomeClass
{
    use SomeTrait;

    public function someObligatoryFunction(): string
    {
        return PHP_EOL;
    }
}

$someObject = new SomeClass();
$someObject->someFunction();
