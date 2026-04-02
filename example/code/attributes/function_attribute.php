<?php

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
