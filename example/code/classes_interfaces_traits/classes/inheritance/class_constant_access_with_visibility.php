<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'base public';
    protected const SOME_PROTECTED_CONSTANT = 'base protected';
    private const SOME_PRIVATE_CONSTANT = 'base private';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::SOME_PRIVATE_CONSTANT : ' . SomeBaseClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::SOME_PRIVATE_CONSTANT : ' . SomeBaseClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'derived public';
    protected const SOME_PROTECTED_CONSTANT = 'derived protected';
    private const SOME_PRIVATE_CONSTANT = 'derived shadowed private'; // It's not overriding but rather shadowing!
    // It's completly new constant - very own constant of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
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
