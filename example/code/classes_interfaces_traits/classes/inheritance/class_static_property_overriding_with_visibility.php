<?php

class SomeBaseClass
{
    public static $somePublicProperty = 'base static public';
    protected static $someProtectedProperty = 'base static protected';
    private static $somePrivateProperty = 'base static private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
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
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static $somePublicProperty = 'derived static public';
    protected static $someProtectedProperty = 'derived static protected';
    private static $somePrivateProperty = 'derived shadowed static private'; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
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
