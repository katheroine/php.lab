<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'base public';
    final public const SOME_FINAL_PUBLIC_CONSTANT = 'base final public';

    protected const SOME_PROTECTED_CONSTANT = 'base protected';
    final protected const SOME_FINAL_PROTECTED_CONSTANT = 'base final protected';

    private const SOME_PRIVATE_CONSTANT = 'base private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
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
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'derived public';
    protected const SOME_PROTECTED_CONSTANT = 'derived protected';

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
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
