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

    final public function someFinalPublicMethod()
    {
        return 'base final public';
    }

    protected function someProtectedMethod()
    {
        return 'base protected';
    }

    final protected function someFinalProtectedMethod()
    {
        return 'base final protected';
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
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . '$this->someFinalProtectedMethod() : ' . $this->someFinalProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . '$this->someFinalPublicMethod() : ' . $this->someFinalPublicMethod() . PHP_EOL
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
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'parent::someFinalProtectedMethod() : ' . parent::someFinalProtectedMethod() . PHP_EOL
            . 'self::someFinalProtectedMethod() : ' . self::someFinalProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'parent::someFinalPublicMethod() : ' . parent::someFinalPublicMethod() . PHP_EOL
            . 'self::someFinalPublicMethod() : ' . self::someFinalPublicMethod() . PHP_EOL
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

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'parent::someFinalProtectedMethod() : ' . parent::someFinalProtectedMethod() . PHP_EOL
            . 'self::someFinalProtectedMethod() : ' . self::someFinalProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'parent::someFinalPublicMethod() : ' . parent::someFinalPublicMethod() . PHP_EOL
            . 'self::someFinalPublicMethod() : ' . self::someFinalPublicMethod() . PHP_EOL
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
