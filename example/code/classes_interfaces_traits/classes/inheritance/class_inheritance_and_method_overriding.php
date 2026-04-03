<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeBaseClass
{
    public function someMethod()
    {
        print("Some method from base class\n");
    }

    public function otherMethod()
    {
        print("Other method from base class\n");
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function otherMethod()
    {
        parent::otherMethod();
        print("Other method from derived class\n");
    }
}

$someObject = new SomeDerivedClass();

$someObject->someMethod();
$someObject->otherMethod();
