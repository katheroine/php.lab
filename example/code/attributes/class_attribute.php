<?php

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
