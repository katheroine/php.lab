<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

readonly class SomeReadonlyClass
{
    public int $someProperty;
    public string $otherProperty;

    public function __construct()
    {
        $this->someProperty = 10;
        $this->otherProperty = 'magenta';
    }
}

readonly class SomeDerivedClass extends SomeReadonlyClass
{
}

$someReadonlyObject = new SomeDerivedClass();

print("Some property: {$someReadonlyObject->someProperty}\n");
print("Some readonly property: {$someReadonlyObject->otherProperty}\n");
