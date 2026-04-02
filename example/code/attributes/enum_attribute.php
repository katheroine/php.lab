<?php

#[Attribute(Attribute::TARGET_CLASS)]
class SomeEnumAttribute
{
    public function __construct(public string $info) {}
}

#[SomeEnumAttribute('some enum attribute')]
enum SomeEnum: string
{
    case SomeCase = 'some case';
}

$someReflection = new ReflectionEnum('SomeEnum');

$someAttributeReflection = $someReflection->getAttributes(SomeEnumAttribute::class)[0];
$someAttributeObject = $someAttributeReflection->newInstance();
print($someAttributeObject->info . PHP_EOL);

print(SomeEnum::SomeCase->value . PHP_EOL);
