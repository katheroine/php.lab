<?php

class SomeClass
{
    public string $somePublicVariable = 'public';
    protected string $someProtectedVariable = 'protected';
    private string $somePrivateVariable = 'private';

    public function somePublicFunction(): void
    {
        print(
            $this->somePublicVariable . $this->somePrivateFunction()
            . $this->someProtectedVariable . $this->somePrivateFunction()
            . $this->somePrivateVariable . $this->somePrivateFunction()
        );

        $this->someProtectedFunction();
    }

    protected function someProtectedFunction(): void
    {
        print($this->somePrivateFunction());
    }

    private function somePrivateFunction(): string
    {
        return PHP_EOL;
    }
}

$someObject = new SomeClass();

print($someObject->somePublicVariable . PHP_EOL);
// print($someObject->someProtectedVariable . PHP_EOL);
// print($someObject->somePrivateVariable . PHP_EOL);

$someObject->somePublicFunction();
// $someObject->someProtectedFunction();
// $someObject->somePrivateFunction();

class SomeSubclass extends SomeClass
{
    public function someSubfunction(): void
    {
        $this->somePublicFunction();
        $this->someProtectedFunction();
        // $this->somePrivateFunction();
    }
}

$someSubobject = new SomeSubclass();
$someSubobject->someSubfunction();
