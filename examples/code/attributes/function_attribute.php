<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

#[Attribute(Attribute::TARGET_FUNCTION)]
class SomeFunctionAttribute
{
    public function __construct(public string $info) {}
}

#[SomeFunctionAttribute('some function attribute')]
function someFunction()
{
    print("some function\n");
}

$someReflection = new ReflectionFunction('someFunction');

$someAttributeReflection = $someReflection->getAttributes(SomeFunctionAttribute::class)[0];
$someAttributeObject = $someAttributeReflection->newInstance();
print($someAttributeObject->info . PHP_EOL);

someFunction();
