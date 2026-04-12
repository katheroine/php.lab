<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    public $somePublicProperty = 'public';
    protected $someProtectedProperty = 'protected';
    private $somePrivateProperty = 'private';

    public function somePublicMethod()
    {
        return $this->somePublicProperty;
    }

    protected function someProtectedMethod()
    {
        return $this->someProtectedProperty;
    }

    private function somePrivateMethod()
    {
        return $this->somePrivateProperty;
    }

    function someMethod(SomeClass $object)
    {
        print(
            "* Constants:\n"
            . $object::class::SOME_PUBLIC_CONSTANT . PHP_EOL
            . $object::class::SOME_PROTECTED_CONSTANT . PHP_EOL
            . $object::class::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* Properties:\n"
            . $object->somePublicProperty . PHP_EOL
            . $object->someProtectedProperty . PHP_EOL
            . $object->somePrivateProperty . PHP_EOL
            . "\n* Methods:\n"
            . $object->somePublicMethod() . PHP_EOL
            . $object->someProtectedMethod() . PHP_EOL
            . $object->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$otherObject = new SomeClass();

$someObject->someMethod($otherObject);
