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

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateStaticMethod() : ' . $this->somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
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
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
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

    public static function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
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
