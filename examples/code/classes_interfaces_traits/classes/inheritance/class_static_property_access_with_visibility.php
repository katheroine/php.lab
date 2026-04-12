<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public static $somePublicProperty = 'base static public';
    protected static $someProtectedProperty = 'base static protected';
    private static $somePrivateProperty = 'base static private';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::$somePrivateProperty : ' . SomeBaseClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::$somePrivateProperty : ' . SomeBaseClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedClass::$someProtectedProperty : ' . SomeDerivedClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedClass::$somePublicProperty : ' . SomeDerivedClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedClass::$someProtectedProperty : ' . SomeDerivedClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedClass::$somePublicProperty : ' . SomeDerivedClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
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

    public static function derivedOverridingStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::$somePrivateProperty : ' . SomeDerivedOverridingClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$someProtectedProperty : ' . SomeDerivedOverridingClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$somePublicProperty : ' . SomeDerivedOverridingClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedOverridingDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::$somePrivateProperty : ' . SomeDerivedOverridingClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$someProtectedProperty : ' . SomeDerivedOverridingClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$somePublicProperty : ' . SomeDerivedOverridingClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseStaticContext();
$someObject->baseDynamicContext();
$someObject->derivedStaticContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseStaticContext();
$otherObject->baseDynamicContext();
$otherObject->derivedOverridingStaticContext();
$otherObject->derivedOverridingDynamicContext();
