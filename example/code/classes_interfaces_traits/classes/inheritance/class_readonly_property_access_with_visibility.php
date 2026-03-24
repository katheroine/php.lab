<?php

class SomeBaseClass
{
    public function __construct(
        public readonly string $somePublicProperty = 'base readonly public',
        protected readonly string $someProtectedProperty = 'base readonly protected',
        private readonly string $somePrivateProperty = 'base readonly private',
    ) {
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
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
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    private readonly string $somePrivateProperty; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function __construct()
    {
        // It mus be called for initialize properties before reading
        // from the derived class object calling base class method.
        parent::__construct(
            'derived readonly public',
            'derived readonly protected',
            'derived readonly private',
        );

        $this->somePrivateProperty = 'derived shadowed readonly private';
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
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
