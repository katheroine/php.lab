<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'base public';
    protected const SOME_PROTECTED_CONSTANT = 'base protected';
    private const SOME_PRIVATE_CONSTANT = 'base private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
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
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
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

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
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
