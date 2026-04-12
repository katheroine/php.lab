<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    static $someStaticProperty = 'base static';
    public $somePublicProperty = 'base public';
    protected $someProtectedProperty = 'base protected';
    private $somePrivateProperty = 'base private';

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . PHP_EOL
        );
    }

    static function staticMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From first derived class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class AnotherClass extends SomeClass
{
    static $someStaticProperty = 'derived static';
    public $somePublicProperty = 'derived public';

    function anotherFunction()
    {
         print(
            "# From second derived class:\n\n"
            . static::$someStaticProperty . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . parent::$someStaticProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

$anotherObject = new AnotherClass();
$anotherObject->anotherFunction();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicProperty . PHP_EOL
    . PHP_EOL
);

$someObject->staticMethod();
$anotherObject->staticMethod();
