<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

#[Attribute(Attribute::TARGET_CLASS)]
class SomeClassAttribute
{
    public function __construct(public string $info) {}
}

#[SomeClassAttribute('some class attribute')]
class SomeClass
{
    public const SOME_CONSTANT = 'some class constant';
    public string $someProperty = 'some property';

    function someMethod(): string
    {
        return 'some method';
    }
}

$someReflection = new ReflectionClass('SomeClass');

$someAttributeReflection = $someReflection->getAttributes(SomeClassAttribute::class)[0];
$someAttributeObject = $someAttributeReflection->newInstance();
print($someAttributeObject->info . PHP_EOL);

$someObject = new SomeClass();
print(SomeClass::SOME_CONSTANT . PHP_EOL);
print($someObject->someProperty . PHP_EOL);
print($someObject->someMethod() . PHP_EOL);
