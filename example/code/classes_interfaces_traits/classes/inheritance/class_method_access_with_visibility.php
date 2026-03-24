<?php

class SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'base public';
    }

    protected function someProtectedMethod()
    {
        return 'base protected';
    }

    private function somePrivateMethod()
    {
        return 'base private';
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'derived public';
    }

    protected function someProtectedMethod()
    {
        return 'derived protected';
    }

    private function somePrivateMethod() // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.
    {
        return 'derived shadowed private';
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseDynamicContext();
$otherObject->derivedOverridingDynamicContext();
