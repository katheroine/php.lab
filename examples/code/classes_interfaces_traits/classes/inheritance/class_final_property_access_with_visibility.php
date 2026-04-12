<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    final public $someFinalPublicProperty = 'base final public';
    final protected $someFinalProtectedProperty = 'base final protected';

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
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
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();
