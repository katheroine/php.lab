<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

#[Attribute]
class SomeFunctionAttribute
{
    public function __construct(public string $info) {}
}

#[SomeFunctionAttribute('Some attribute.')]
function someFunction()
{
}

$someReflection = new ReflectionFunction('someFunction');

$someAttributes = $someReflection->getAttributes(SomeFunctionAttribute::class);

foreach ($someAttributes as $attribute) {
    $someFunctionAttributeObject = $attribute->newInstance();
    print($someFunctionAttributeObject->info . PHP_EOL);
}
