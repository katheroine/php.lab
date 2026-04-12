<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class BaseClass
{
    public function somePublicMethod()
    {
        return 'base: public';
    }

    protected function someProtectedMethod()
    {
        return 'base: protected';
    }

    private function somePrivateMethod()
    {
        return 'base: private';
    }

    function someMethod()
    {
        print(
            '# From ' . static::class . PHP_EOL . PHP_EOL
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class DerivedClass extends BaseClass
{
    function somePublicMethod()
    {
        return 'derived: public';
    }

    function someProtectedMethod()
    {
        return 'derived: protected';
    }

    function somePrivateMethod()
    {
        return 'derived: private';
    }

}

$baseObject = new BaseClass();
$baseObject->someMethod();

$derivedObject = new DerivedClass();
$derivedObject->someMethod();
