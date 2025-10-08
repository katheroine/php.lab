<?php

abstract class SomeClass
{
    public $someVariable = 'hello';

    public abstract function someObligatoryFunction(): string;

    public function someFunction(): void
    {
        print(
            $this->someVariable . $this->someObligatoryFunction()
        );
    }
}

// $someObject = new SomeClass();

class SomeSubclass extends SomeClass
{
    public function someObligatoryFunction(): string
    {
        return PHP_EOL;
    }
}

$someSubobject = new SomeSubclass();
$someSubobject->someFunction();
