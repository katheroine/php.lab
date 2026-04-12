<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public $somePublicProperty = 'base public' {
        get => $this->somePublicProperty . ' base hook';
    }
    protected $someProtectedProperty = 'base protected' {
        get => $this->someProtectedProperty . ' base hook';
    }
    private $somePrivateProperty = 'base private' {
        get => $this->somePrivateProperty . ' base hook';
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
    public $somePublicProperty = 'derived public' {
        get => parent::$somePublicProperty::get() . ' + ' . $this->somePublicProperty . ' derived hook';
    }
    protected $someProtectedProperty = 'derived protected' {
        get => parent::$someProtectedProperty::get() . ' + ' . $this->someProtectedProperty . ' derived hook';
    }
    private $somePrivateProperty = 'derived shadowed private' {
        get => $this->somePrivateProperty . ' derived shadowed hook';
    } // It's not overriding but rather shadowing!
    // It's completly new property hook - very own property hook of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

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
