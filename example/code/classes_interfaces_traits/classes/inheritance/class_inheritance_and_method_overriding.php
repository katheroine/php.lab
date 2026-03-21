<?php

class SomeBaseClass
{
    public function someMethod()
    {
        print("Some method from base class\n");
    }

    public function otherMethod()
    {
        print("Other method from base class\n");
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function otherMethod()
    {
        parent::otherMethod();
        print("Other method from derived class\n");
    }
}

$someObject = new SomeDerivedClass();

$someObject->someMethod();
$someObject->otherMethod();
