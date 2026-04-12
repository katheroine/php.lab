<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    public $somePublicProperty = 'public';
    protected $someProtectedProperty = 'protected';
    private $somePrivateProperty = 'private';

    public function somePublicMethod()
    {
        return 'public';
    }

    protected function someProtectedMethod()
    {
        return 'protected';
    }

    private function somePrivateMethod()
    {
        return 'private';
    }

    public function someMethod()
    {
        print(
            __METHOD__
            . "\n* constants:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* properties:\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . "\n* methods:\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }

    public function anotherMethod(): void
    {
        print(__METHOD__ . PHP_EOL);
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    function otherMethod()
    {
        print(
            __METHOD__
            . "\n* constants:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* properties:\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . "\n* methods:\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function anotherMethod(): void
    {
        parent::anotherMethod();
        print(__METHOD__ . PHP_EOL);
    }
}

$someObject = new SomeDerivedClass();

print(
    "# Global scope:\n"
    . "\n* constants:\n"
    . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . "\n* properties:\n"
    . $someObject->somePublicProperty . PHP_EOL
    . "\n* methods:\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

$someObject->someMethod();
$someObject->otherMethod();
$someObject->anotherMethod();
print(PHP_EOL);
