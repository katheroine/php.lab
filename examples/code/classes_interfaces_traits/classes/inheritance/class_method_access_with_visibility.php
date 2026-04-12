<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
            . 'SomeBaseClass::somePrivateMethod() : ' . SomeBaseClass::somePrivateMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateMethod() : ' . (__CLASS__)::somePrivateMethod() . PHP_EOL
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
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
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedMethod() : ' . SomeDerivedClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicMethod() : ' . SomeDerivedClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
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
            . 'SomeDerivedOverridingClass::somePrivateMethod() : ' . SomeDerivedOverridingClass::somePrivateMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateMethod() : ' . (__CLASS__)::somePrivateMethod() . PHP_EOL
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedMethod() : ' . SomeDerivedOverridingClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicMethod() : ' . SomeDerivedOverridingClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
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
