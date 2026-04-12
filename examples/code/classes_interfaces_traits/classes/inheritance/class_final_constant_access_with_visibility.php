<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    final public const SOME_FINAL_PUBLIC_CONSTANT = 'base final public const';
    final protected const SOME_FINAL_PROTECTED_CONSTANT = 'base final protected const';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
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
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public static function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
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
