<?php

class SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'base public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'base protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'base private';
    }

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::somePrivateStaticMethod() : ' . SomeBaseClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::somePrivateStaticMethod() : ' . SomeBaseClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateStaticMethod() : ' . $this->somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
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
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedStaticMethod() : ' . SomeDerivedClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicStaticMethod() : ' . SomeDerivedClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedStaticMethod() : ' . SomeDerivedClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicStaticMethod() : ' . SomeDerivedClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'derived public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'derived protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'derived shadowed private';
    } // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::somePrivateStaticMethod() : ' . SomeDerivedOverridingClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedStaticMethod() : ' . SomeDerivedOverridingClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicStaticMethod() : ' . SomeDerivedOverridingClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public static function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::somePrivateStaticMethod() : ' . SomeDerivedOverridingClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedStaticMethod() : ' . SomeDerivedOverridingClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicStaticMethod() : ' . SomeDerivedOverridingClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
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
