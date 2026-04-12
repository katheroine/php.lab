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

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
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

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
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
