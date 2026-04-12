<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

#[Attribute]
class SomeFunctionAttribute
{
}

#[Attribute]
class SomeParamenterAttribute
{
}

#[Attribute]
class SomeEnumAttribute
{
}

#[Attribute]
class SomeInterfaceAttribute
{
}

#[Attribute]
class SomeTraitAttribute
{
}

#[Attribute]
class SomeClassAttribute
{
}

#[Attribute]
class SomeConstantAttribute
{
}

#[Attribute]
class SomePropertyAttribute
{
}

#[Attribute]
class SomeMethodAttribute
{
}

#[SomeFunctionAttribute]
function someFunction(#[SomeParamenterAttribute] string $someArgument)
{
}

#[SomeEnumAttribute]
enum SomeEnum
{
}

#[SomeInterfaceAttribute]
interface SomeInterface
{
}

#[SomeTraitAttribute]
trait SomeTrait
{
}

#[SomeClassAttribute]
class someClass implements SomeInterface
{
    use SomeTrait;

    #[SomeConstantAttribute]
    public const SOME_CONSTANT = 1024;

    #[SomePropertyAttribute]
    private string $someProperty = 'hello';

    #[SomeMethodAttribute]
    function someMethod(): void
    {
    }
}

$someAnonymousFunction = #[SomeAnonymousFunctionAttribute] function() {};

$someAnonymousClassObject = new #[SomeAnonymousClassAttribute] class {};

function displayAttribute(ReflectionAttribute $attributeReflection)
{
    print(
        'Name: ' . $attributeReflection->getName() . PHP_EOL
        . 'Target: ' . $attributeReflection->getTarget() . PHP_EOL
        . 'Is repeated? ' . ($attributeReflection->isRepeated() ? 'yes' : 'no') . PHP_EOL
        . "Arguments:\n"
    );
    print_r($attributeReflection->getArguments());
    print(PHP_EOL);
}

$functionReflection = new ReflectionFunction('someFunction');
$attributeReflection = $functionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$paramenterReflection = $functionReflection->getParameters()[0];
$attributeReflection = $paramenterReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$enumReflection = new ReflectionEnum('SomeEnum');
$attributeReflection = $enumReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$classReflection = new ReflectionClass('SomeClass');
$attributeReflection = $classReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$interfaceReflection = $classReflection->getInterfaces()['SomeInterface'];
$attributeReflection = $interfaceReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$traitReflection = $classReflection->getTraits()['SomeTrait'];
$attributeReflection = $traitReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$constantReflection = $classReflection->getReflectionConstant('SOME_CONSTANT');
$attributeReflection = $constantReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$propertyReflection = $classReflection->getProperty('someProperty');
$attributeReflection = $propertyReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$methodReflection = $classReflection->getMethod('someMethod');
$attributeReflection = $methodReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousFunctionReflection = new ReflectionFunction($someAnonymousFunction);
$attributeReflection = $anonymousFunctionReflection->getAttributes()[0];
displayAttribute($attributeReflection);

$anonymousClassReflection = new ReflectionClass($someAnonymousClassObject);
$attributeReflection = $anonymousClassReflection->getAttributes()[0];
displayAttribute($attributeReflection);
