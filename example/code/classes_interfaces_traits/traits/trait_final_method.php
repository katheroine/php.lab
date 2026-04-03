<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'some method';
    }

    public function otherMethod(): string
    {
        return 'other method';
    }

    public function anotherMethod(): string
    {
        return 'another method';
    }
}

class SomeBaseClass
{
    use SomeTrait {
        SomeTrait::someMethod as final;
        SomeTrait::otherMethod as final otherTraitMethod;
    }

    public function otherMethod(): string
    {
        return $this->otherTraitMethod() . ' overriden in base';
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function anotherMethod(): string
    {
        return parent::anotherMethod() . ' overriden in derived';
    }
}

$someObject = new SomeDerivedClass();
print($someObject->someMethod() . PHP_EOL);
print($someObject->otherMethod() . PHP_EOL);
print($someObject->anotherMethod() . PHP_EOL);
