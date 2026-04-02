<?php

#[Attribute]
class SomeFunctionAttribute
{
    public function __construct(public string $info) {}
}

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_FUNCTION)]
class OtherFunctionAttribute extends SomeFunctionAttribute
{
}

#[SomeFunctionAttribute('Some attribute.')]
#[OtherFunctionAttribute('Other attribute 1.')]
#[
    OtherFunctionAttribute('Other attribute 2.'),
    OtherFunctionAttribute('Other attribute 3.')
]
function someFunction()
{
}

$someReflection = new ReflectionFunction('someFunction');

$someAttributes = $someReflection->getAttributes(SomeFunctionAttribute::class);

foreach ($someAttributes as $attribute) {
    $someFunctionAttributeObject = $attribute->newInstance();
    print($someFunctionAttributeObject->info . PHP_EOL);
}

$otherAttributes = $someReflection->getAttributes(OtherFunctionAttribute::class);

foreach ($otherAttributes as $attribute) {
    $otherFunctionAttributeObject = $attribute->newInstance();
    print($otherFunctionAttributeObject->info . PHP_EOL);
}
