<?php

trait SomeTrait
{
    public function someFunction(): void
    {
        print("Originally public\n\n");
    }

    private function otherFunction(): void
    {
        print("Originally private\n\n");
    }
}

class SomeClass
{
    use SomeTrait
    {
        someFunction as private;
        otherFunction as public;
    }
}

$someObject = new SomeClass();

// $someObject->someFunction();
$someObject->otherFunction();
