<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    final public function someFinalPublicMethod()
    {
        return 'base final public';
    }

    final protected function someFinalProtectedMethod()
    {
        return 'base final protected';
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someFinalProtectedMethod() : ' . SomeBaseClass::someFinalProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someFinalProtectedMethod() : ' . (__CLASS__)::someFinalProtectedMethod() . PHP_EOL
            . 'self::someFinalProtectedMethod() : ' . self::someFinalProtectedMethod() . PHP_EOL
            . 'static::someFinalProtectedMethod() : ' . static::someFinalProtectedMethod() . PHP_EOL
            . '$this->someFinalProtectedMethod() : ' . $this->someFinalProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::someFinalPublicMethod() : ' . SomeBaseClass::someFinalPublicMethod() . PHP_EOL
            . '(__CLASS__)::someFinalPublicMethod() : ' . (__CLASS__)::someFinalPublicMethod() . PHP_EOL
            . 'self::someFinalPublicMethod() : ' . self::someFinalPublicMethod() . PHP_EOL
            . 'static::someFinalPublicMethod() : ' . static::someFinalPublicMethod() . PHP_EOL
            . '$this->someFinalPublicMethod() : ' . $this->someFinalPublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someFinalProtectedMethod() : ' . SomeBaseClass::someFinalProtectedMethod() . PHP_EOL
            . 'parent::someFinalProtectedMethod() : ' . parent::someFinalProtectedMethod() . PHP_EOL
            . 'SomeDerivedClass::someFinalProtectedMethod() : ' . SomeDerivedClass::someFinalProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someFinalProtectedMethod() : ' . (__CLASS__)::someFinalProtectedMethod() . PHP_EOL
            . 'self::someFinalProtectedMethod() : ' . self::someFinalProtectedMethod() . PHP_EOL
            . 'static::someFinalProtectedMethod() : ' . static::someFinalProtectedMethod() . PHP_EOL
            . '$this->someFinalProtectedMethod() : ' . $this->someFinalProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::someFinalPublicMethod() : ' . SomeBaseClass::someFinalPublicMethod() . PHP_EOL
            . 'parent::someFinalPublicMethod() : ' . parent::someFinalPublicMethod() . PHP_EOL
            . 'SomeDerivedClass::someFinalPublicMethod() : ' . SomeDerivedClass::someFinalPublicMethod() . PHP_EOL
            . '(__CLASS__)::someFinalPublicMethod() : ' . (__CLASS__)::someFinalPublicMethod() . PHP_EOL
            . 'self::someFinalPublicMethod() : ' . self::someFinalPublicMethod() . PHP_EOL
            . 'static::someFinalPublicMethod() : ' . static::someFinalPublicMethod() . PHP_EOL
            . '$this->someFinalPublicMethod() : ' . $this->someFinalPublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();
