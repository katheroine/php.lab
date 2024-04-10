<?php

#[SomeFunctionAttribute]
#[OtherFunctionAttribute('some argument', 3)]
#[AnotherFunctionAttribute, YetAnotherFunctionAttribute]
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

$functionReflection = new ReflectionFunction('someFunction');
$attributes = $functionReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

print($attributes[1]->getName() . PHP_EOL);
print($attributes[1]->getTarget() . PHP_EOL);
var_dump($attributes[1]->getArguments());
print($attributes[1]->isRepeated() . PHP_EOL);

print(PHP_EOL);

print($attributes[2]->getName() . PHP_EOL);
print($attributes[2]->getTarget() . PHP_EOL);
var_dump($attributes[2]->getArguments());
print($attributes[2]->isRepeated() . PHP_EOL);

print(PHP_EOL);

print($attributes[3]->getName() . PHP_EOL);
print($attributes[3]->getTarget() . PHP_EOL);
var_dump($attributes[3]->getArguments());
print($attributes[3]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$paramenterReflection = $functionReflection->getParameters()[0];
$attributes = $paramenterReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$enumReflection = new ReflectionEnum('SomeEnum');
$attributes = $enumReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$classReflection = new ReflectionClass('SomeClass');
$attributes = $classReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$interfaceReflection = $classReflection->getInterfaces()['SomeInterface'];
$attributes = $interfaceReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$traitReflection = $classReflection->getTraits()['SomeTrait'];
$attributes = $traitReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$constantReflection = $classReflection->getReflectionConstant('SOME_CONSTANT');
$attributes = $constantReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$propertyReflection = $classReflection->getProperty('someProperty');
$attributes = $propertyReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$methodReflection = $classReflection->getMethod('someMethod');
$attributes = $methodReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$anonymousFunctionReflection = new ReflectionFunction($someAnonymousFunction);
$attributes = $anonymousFunctionReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);

$anonymousClassReflection = new ReflectionClass($someAnonymousClassObject);
$attributes = $anonymousClassReflection->getAttributes();

print($attributes[0]->getName() . PHP_EOL);
print($attributes[0]->getTarget() . PHP_EOL);
var_dump($attributes[0]->getArguments());
print($attributes[0]->isRepeated() . PHP_EOL);

print(PHP_EOL);
