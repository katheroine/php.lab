<?php

class SomeBaseClass
{
}

interface SomeInterface
{
}

trait SomeTrait
{
}

enum SomeEnum: string
{
    case SOME_CASE = 'some case';
    case OTHER_CASE = 'other case';
    case ANOTHER_CASE = 'another case';
}

$enumReflection = new ReflectionEnum('SomeEnum');

print('Is implicit abstract bit? ' . $enumReflection::IS_IMPLICIT_ABSTRACT . PHP_EOL);
print('Is explicit abstract bit? ' . $enumReflection::IS_EXPLICIT_ABSTRACT . PHP_EOL);
print('Is final bit? ' . $enumReflection::IS_FINAL . PHP_EOL);
print('Is readonly bit? ' . $enumReflection::IS_READONLY . PHP_EOL);

print(PHP_EOL);

print('Enum identifier: ' . $enumReflection->name . PHP_EOL);

print(PHP_EOL);

print('Class identifier: ' . $enumReflection->getName() . PHP_EOL);
print('Short name: ' . $enumReflection->getShortName() . PHP_EOL);
print('Is in namespace? ' . $enumReflection->inNamespace() . PHP_EOL);
print('Namespace identifier: ' . $enumReflection->getNamespaceName() . PHP_EOL);
print('Parent class identifier: ' . $enumReflection->getParentClass() . PHP_EOL);

print(PHP_EOL);

print('Is internal? ' . $enumReflection->isInternal() . PHP_EOL);
print('Is user-defined? ' . $enumReflection->isUserDefined() . PHP_EOL);

print('Is interface? ' . $enumReflection->isInterface() . PHP_EOL);
print('Is trait? ' . $enumReflection->isTrait() . PHP_EOL);
print('Is enum? ' . $enumReflection->isEnum() . PHP_EOL);

print('Is abstract? ' . $enumReflection->isAbstract() . PHP_EOL);
print('Is anonymous? ' . $enumReflection->isAnonymous() . PHP_EOL);
print('Is read only? ' . $enumReflection->isReadOnly() . PHP_EOL);
print('Is final? ' . $enumReflection->isFinal() . PHP_EOL);

print('Is instantiable? ' . $enumReflection->isInstantiable() . PHP_EOL);
print('Is cloneable? ' . $enumReflection->isCloneable() . PHP_EOL);
print('Is iterable? ' . $enumReflection->isIterable() . PHP_EOL);

print(PHP_EOL);

print('Class modifiers bit: ' . $enumReflection->getModifiers() . PHP_EOL);

print(PHP_EOL);

print('Is instance? ' . $enumReflection->isInstance($enumReflection) . PHP_EOL);
print('Is subclass of SomeBaseClass? ' . $enumReflection->isSubclassOf('SomeBaseClass') . PHP_EOL);
print('Implements interface SomeInterface? ' . $enumReflection->implementsInterface('SomeInterface') . PHP_EOL);

print(PHP_EOL);

print("Interface names:\n");
var_dump($enumReflection->getInterfaceNames());
print("Interfaces:\n");
var_dump($enumReflection->getInterfaces());
print("Trait names:\n");
var_dump($enumReflection->getTraitNames());
print("Traits:\n");
var_dump($enumReflection->getTraits());
print("Trait aliases:\n");
var_dump($enumReflection->getTraitAliases());

print(PHP_EOL);

print('Class file name: ' . $enumReflection->getFileName() . PHP_EOL);
print("Class extension:\n");
var_dump($enumReflection->getExtension());
print("Class extension name:\n");
var_dump($enumReflection->getExtensionName());

print(PHP_EOL);

print('Start line: ' . $enumReflection->getStartLine() . PHP_EOL);
print('End line: ' . $enumReflection->getEndLine() . PHP_EOL);

print(PHP_EOL);

print('Is backed? ' . $enumReflection->isBacked() . PHP_EOL);
print("Backing type:\n");
var_dump($enumReflection->getBackingType());

print(PHP_EOL);

print("Doc comment:\n");
var_dump($enumReflection->getDocComment());

print(PHP_EOL);

print("Enum attributes:\n");
var_dump($enumReflection->getAttributes());

print(PHP_EOL);

print("Cases:\n");
var_dump($enumReflection->getCases());
print('Has case SOME_CASE? ' . $enumReflection->hasCase('SOME_CASE') . PHP_EOL);
print('Enum SOME_CASE value: ' . $enumReflection->getCase('SOME_CASE') . PHP_EOL);

print(PHP_EOL);

print("Constants:\n");
var_dump($enumReflection->getConstants());
print('Has constant SOME_CLASS_CONSTANT? ' . $enumReflection->hasConstant('SOME_CLASS_CONSTANT') . PHP_EOL);
print('Constant SOME_CLASS_CONSTANT value: ' . $enumReflection->getConstant('SOME_CLASS_CONSTANT') . PHP_EOL);
print("Reflection constants:\n");
var_dump($enumReflection->getReflectionConstants());
print("Reflection constant SOME_CLASS_CONSTANT:\n");
var_dump($enumReflection->getReflectionConstant('SOME_CLASS_CONSTANT'));

print(PHP_EOL);

print("Properties:\n");
var_dump($enumReflection->getProperties());
print('Has property someObjectVariable? ' . $enumReflection->hasProperty('someObjectVariable') . PHP_EOL);
print("Property someObjectVariable value:\n");
// var_dump($enumReflection->getProperty('someObjectVariable'));

print(PHP_EOL);

print("Default properties:\n");
var_dump($enumReflection->getDefaultProperties());

print(PHP_EOL);

print("Static properties:\n");
var_dump($enumReflection->getStaticProperties());
// print('Static property someClassVariable value: ' . $enumReflection->getStaticPropertyValue('someClassVariable') . PHP_EOL);

print(PHP_EOL);

print("Methods:\n");
var_dump($enumReflection->getMethods());
print('Has method someObjectFunction? ' . $enumReflection->hasMethod('someObjectFunction') . PHP_EOL);
print("Method someObjectFunction:\n");
// var_dump($enumReflection->getMethod('someObjectFunction'));

print(PHP_EOL);

print("Constructor:\n");
var_dump($enumReflection->getConstructor());

print(PHP_EOL);

print("To string:\n" . $enumReflection->__toString() . PHP_EOL);

print(PHP_EOL);

// $enumReflection->setStaticPropertyValue('someClassVariable', 2048);
// print('Static property someClassVariable value: ' . $enumReflection->getStaticPropertyValue('someClassVariable') . PHP_EOL);
