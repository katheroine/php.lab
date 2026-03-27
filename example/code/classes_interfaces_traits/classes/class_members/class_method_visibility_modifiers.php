<?php

class SomeClass
{
    public function somePublicMethod()
    {
        return 'public';
    }

    protected function someProtectedMethod()
    {
        return 'protected';
    }

    private function somePrivateMethod()
    {
        return 'private';
    }

    public function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    public function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);
