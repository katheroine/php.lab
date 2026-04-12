<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public const string SOME_CONSTANT = 'base constant';
    public static string $someStaticProperty = 'base static property';
    public string $someProperty = 'base property';
    public readonly string $someReadonlyProperty;
    final public static string $someFinalStaticProperty = 'base final static property';
    final public string $someFinalProperty = 'base final property';

    public function __construct()
    {
        $this->someReadonlyProperty = 'base readonly property';
    }

    public static function someStaticMethod(): string
    {
        return 'base static method';
    }

    public function someMethod(): string
    {
        return 'base method';
    }

    final public static function someFinalStaticMethod(): string
    {
        return 'base final static method';
    }

    final public function someFinalMethod(): string
    {
        return 'base final method';
    }

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . '$this->someProperty : ' . $this->someProperty . PHP_EOL
            . '$this->someReadonlyProperty : ' . $this->someReadonlyProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . '$this->someStaticMethod() : ' . $this->someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . '$this->someFinalStaticMethod() : ' . $this->someFinalStaticMethod() . PHP_EOL
            . '$this->someMethod() : ' . $this->someMethod() . PHP_EOL
            . '$this->someFinalMethod() : ' . $this->someFinalMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext()
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext()
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . '$this->someProperty : ' . $this->someProperty . PHP_EOL
            . '$this->someReadonlyProperty : ' . $this->someReadonlyProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . '$this->someStaticMethod() : ' . $this->someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . '$this->someFinalStaticMethod() : ' . $this->someFinalStaticMethod() . PHP_EOL
            . '$this->someMethod() : ' . $this->someMethod() . PHP_EOL
            . '$this->someFinalMethod() : ' . $this->someFinalMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class someDerivedOverridingClass extends SomeBaseClass
{
    public const string SOME_CONSTANT = 'derived constant';
    public static string $someStaticProperty = 'derived static property';
    public string $someProperty = 'derived property';
    public readonly string $someReadonlyProperty;

    public function __construct()
    {
        $this->someReadonlyProperty = 'derived readonly property';
    }

    public static function someStaticMethod(): string
    {
        return 'derived static method';
    }

    public function someMethod(): string
    {
        return 'derived method';
    }

    public static function derivedOverridingStaticContext()
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . 'parent::SOME_CONSTANT : ' . parent::SOME_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_CONSTANT : ' . SomeDerivedOverridingClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . 'parent::$someStaticProperty : ' . parent::$someStaticProperty . PHP_EOL
            . 'someDerivedOverridingClass::$someStaticProperty : ' . someDerivedOverridingClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . 'parent::$someFinalStaticProperty : ' . parent::$someFinalStaticProperty . PHP_EOL
            . 'someDerivedOverridingClass::$someFinalStaticProperty : ' . someDerivedOverridingClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . 'parent::someStaticMethod() : ' . parent::someStaticMethod() . PHP_EOL
            . 'someDerivedOverridingClass::someStaticMethod() : ' . someDerivedOverridingClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . 'parent::someFinalStaticMethod() : ' . parent::someFinalStaticMethod() . PHP_EOL
            . 'someDerivedOverridingClass::someFinalStaticMethod() : ' . someDerivedOverridingClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__
            . "\n\n* constants:\n\n"
            . 'SomeBaseClass::SOME_CONSTANT : ' . SomeBaseClass::SOME_CONSTANT . PHP_EOL
            . 'parent::SOME_CONSTANT : ' . parent::SOME_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_CONSTANT : ' . SomeDerivedOverridingClass::SOME_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_CONSTANT : ' . (__CLASS__)::SOME_CONSTANT . PHP_EOL
            . 'self::SOME_CONSTANT : ' . self::SOME_CONSTANT . PHP_EOL
            . 'static::SOME_CONSTANT : ' . static::SOME_CONSTANT . PHP_EOL
            . "\n* properties:\n\n"
            . 'SomeBaseClass::$someStaticProperty : ' . SomeBaseClass::$someStaticProperty . PHP_EOL
            . 'parent::$someStaticProperty : ' . parent::$someStaticProperty . PHP_EOL
            . 'someDerivedOverridingClass::$someStaticProperty : ' . someDerivedOverridingClass::$someStaticProperty . PHP_EOL
            . '(__CLASS__)::$someStaticProperty : ' . (__CLASS__)::$someStaticProperty . PHP_EOL
            . 'self::$someStaticProperty : ' . self::$someStaticProperty . PHP_EOL
            . 'static::$someStaticProperty : ' . static::$someStaticProperty . PHP_EOL
            . 'SomeBaseClass::$someFinalStaticProperty : ' . SomeBaseClass::$someFinalStaticProperty . PHP_EOL
            . 'parent::$someFinalStaticProperty : ' . parent::$someFinalStaticProperty . PHP_EOL
            . 'someDerivedOverridingClass::$someFinalStaticProperty : ' . someDerivedOverridingClass::$someFinalStaticProperty . PHP_EOL
            . '(__CLASS__)::$someFinalStaticProperty : ' . (__CLASS__)::$someFinalStaticProperty . PHP_EOL
            . 'self::$someFinalStaticProperty : ' . self::$someFinalStaticProperty . PHP_EOL
            . 'static::$someFinalStaticProperty : ' . static::$someFinalStaticProperty . PHP_EOL
            . '$this->someProperty : ' . $this->someProperty . PHP_EOL
            . '$this->someReadonlyProperty : ' . $this->someReadonlyProperty . PHP_EOL
            . "\n* methods:\n\n"
            . 'SomeBaseClass::someStaticMethod() : ' . SomeBaseClass::someStaticMethod() . PHP_EOL
            . 'parent::someStaticMethod() : ' . parent::someStaticMethod() . PHP_EOL
            . 'someDerivedOverridingClass::someStaticMethod() : ' . someDerivedOverridingClass::someStaticMethod() . PHP_EOL
            . '(__CLASS__)::someStaticMethod() : ' . (__CLASS__)::someStaticMethod() . PHP_EOL
            . 'self::someStaticMethod() : ' . self::someStaticMethod() . PHP_EOL
            . 'static::someStaticMethod() : ' . static::someStaticMethod() . PHP_EOL
            . '$this->someStaticMethod() : ' . $this->someStaticMethod() . PHP_EOL
            . 'SomeBaseClass::someFinalStaticMethod() : ' . SomeBaseClass::someFinalStaticMethod() . PHP_EOL
            . 'parent::someFinalStaticMethod() : ' . parent::someFinalStaticMethod() . PHP_EOL
            . 'someDerivedOverridingClass::someFinalStaticMethod() : ' . someDerivedOverridingClass::someFinalStaticMethod() . PHP_EOL
            . '(__CLASS__)::someFinalStaticMethod() : ' . (__CLASS__)::someFinalStaticMethod() . PHP_EOL
            . 'self::someFinalStaticMethod() : ' . self::someFinalStaticMethod() . PHP_EOL
            . 'static::someFinalStaticMethod() : ' . static::someFinalStaticMethod() . PHP_EOL
            . '$this->someFinalStaticMethod() : ' . $this->someFinalStaticMethod() . PHP_EOL
            . '$this->someMethod() : ' . $this->someMethod() . PHP_EOL
            . '$this->someFinalMethod() : ' . $this->someFinalMethod() . PHP_EOL
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

$otherObject->derivedOverridingStaticContext();
$otherObject->derivedOverridingDynamicContext();
