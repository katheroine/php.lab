<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

#[Attribute]
class SomeAttribute
{
    public function __construct(public string $someArgument)
    {
    }
}

#[SomeAttribute('some function')]
function someFunction(#[SomeParamenterAttribute] string $someArgument)
{
}

#[SomeAttribute('some enum')]
enum SomeEnum
{
}

#[SomeAttribute('some interface')]
interface SomeInterface
{
}

#[SomeAttribute('some trait')]
trait SomeTrait
{
}

#[SomeAttribute('some interface')]
class someClass implements SomeInterface
{
    use SomeTrait;

    #[SomeAttribute('some class constant')]
    public const SOME_CONSTANT = 1024;

    #[SomeAttribute('some property')]
    private string $someProperty = 'hello';

    #[SomeAttribute('some method')]
    function someMethod(): void
    {
    }
}

$someAnonymousFunction = #[SomeAttribute('some anonymous function')] function() {};

$someAnonymousClassObject = new #[SomeAttribute('some anonymous class object')] class {};

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
