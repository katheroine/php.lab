<?php

class SomeBaseClass
{
    public $somePublicProperty = 'base public' {
        get => $this->somePublicProperty . ' base hook';
    }
    public $someFinalPublicProperty = 'base final public' {
        final get => $this->someFinalPublicProperty . ' base final hook';
    }

    protected $someProtectedProperty = 'base protected' {
        get => $this->someProtectedProperty . ' base hook';
    }
    protected $someFinalProtectedProperty = 'base final protected' {
        final get => $this->someFinalProtectedProperty . ' base hook';
    }

    private $somePrivateProperty = 'base private' {
        get => $this->somePrivateProperty . ' base hook';
    }

    public function baseContext(): void
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
    public function derivedContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public $somePublicProperty = 'derived public' {
        get => $this->somePublicProperty . ' derived hook';
    }

    protected $someProtectedProperty = 'derived protected' {
        get => $this->someProtectedProperty . ' derived hook';
    }

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();
