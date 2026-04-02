<?php

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
