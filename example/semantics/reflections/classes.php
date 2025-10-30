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

abstract class SomeClass extends SomeBaseClass implements SomeInterface
{
    use SomeTrait;

    public const SOME_CLASS_CONSTANT = 'lalala';
    public static int $someClassVariable = 1024;
    public string $someObjectVariable = 'hello';
    public readonly float $someUnchengeableVariable;

    public function __construct()
    {
        $this->someUnchengeableVariable = 1.5;
    }

    public static function someClassFunction(): void
    {
    }

    public function someObjectFunction(): void
    {
    }
}

$classReflection = new ReflectionClass('SomeClass');

print('Is implicit abstract bit? ' . $classReflection::IS_IMPLICIT_ABSTRACT . PHP_EOL);
print('Is explicit abstract bit? ' . $classReflection::IS_EXPLICIT_ABSTRACT . PHP_EOL);
print('Is final bit? ' . $classReflection::IS_FINAL . PHP_EOL);
print('Is readonly bit? ' . $classReflection::IS_READONLY . PHP_EOL);

print(PHP_EOL);

print('Class identifier: ' . $classReflection->name . PHP_EOL);

print(PHP_EOL);

print('Class identifier: ' . $classReflection->getName() . PHP_EOL);
print('Short name: ' . $classReflection->getShortName() . PHP_EOL);
print('Is in namespace? ' . $classReflection->inNamespace() . PHP_EOL);
print('Namespace identifier: ' . $classReflection->getNamespaceName() . PHP_EOL);
print('Parent class identifier: ' . $classReflection->getParentClass() . PHP_EOL);

print(PHP_EOL);

print('Is internal? ' . $classReflection->isInternal() . PHP_EOL);
print('Is user-defined? ' . $classReflection->isUserDefined() . PHP_EOL);

print('Is interface? ' . $classReflection->isInterface() . PHP_EOL);
print('Is trait? ' . $classReflection->isTrait() . PHP_EOL);
print('Is enum? ' . $classReflection->isEnum() . PHP_EOL);

print('Is abstract? ' . $classReflection->isAbstract() . PHP_EOL);
print('Is anonymous? ' . $classReflection->isAnonymous() . PHP_EOL);
print('Is read only? ' . $classReflection->isReadOnly() . PHP_EOL);
print('Is final? ' . $classReflection->isFinal() . PHP_EOL);

print('Is instantiable? ' . $classReflection->isInstantiable() . PHP_EOL);
print('Is cloneable? ' . $classReflection->isCloneable() . PHP_EOL);
print('Is iterable? ' . $classReflection->isIterable() . PHP_EOL);

print(PHP_EOL);

print('Class modifiers bit: ' . $classReflection->getModifiers() . PHP_EOL);

print(PHP_EOL);

print('Is instance? ' . $classReflection->isInstance($classReflection) . PHP_EOL);
print('Is subclass of SomeBaseClass? ' . $classReflection->isSubclassOf('SomeBaseClass') . PHP_EOL);
print('Implements interface SomeInterface? ' . $classReflection->implementsInterface('SomeInterface') . PHP_EOL);

print(PHP_EOL);

print("Interface names:\n");
var_dump($classReflection->getInterfaceNames());
print("Interfaces:\n");
var_dump($classReflection->getInterfaces());
print("Trait names:\n");
var_dump($classReflection->getTraitNames());
print("Traits:\n");
var_dump($classReflection->getTraits());
print("Trait aliases:\n");
var_dump($classReflection->getTraitAliases());

print(PHP_EOL);

print('Class file name: ' . $classReflection->getFileName() . PHP_EOL);
print("Class extension:\n");
var_dump($classReflection->getExtension());
print("Class extension name:\n");
var_dump($classReflection->getExtensionName());

print(PHP_EOL);

print('Start line: ' . $classReflection->getStartLine() . PHP_EOL);
print('End line: ' . $classReflection->getEndLine() . PHP_EOL);

print(PHP_EOL);

print("Doc comment:\n");
var_dump($classReflection->getDocComment());

print(PHP_EOL);

print("Constant attributes:\n");
var_dump($classReflection->getAttributes());

print(PHP_EOL);

print("Constants:\n");
var_dump($classReflection->getConstants());
print('Has constant SOME_CLASS_CONSTANT? ' . $classReflection->hasConstant('SOME_CLASS_CONSTANT') . PHP_EOL);
print('Constant SOME_CLASS_CONSTANT value: ' . $classReflection->getConstant('SOME_CLASS_CONSTANT') . PHP_EOL);
print("Reflection constants:\n");
var_dump($classReflection->getReflectionConstants());
print("Reflection constant SOME_CLASS_CONSTANT:\n");
var_dump($classReflection->getReflectionConstant('SOME_CLASS_CONSTANT'));

print(PHP_EOL);

print("Properties:\n");
var_dump($classReflection->getProperties());
print('Has property someObjectVariable? ' . $classReflection->hasProperty('someObjectVariable') . PHP_EOL);
print("Property someObjectVariable value:\n");
var_dump($classReflection->getProperty('someObjectVariable'));

print(PHP_EOL);

print("Default properties:\n");
var_dump($classReflection->getDefaultProperties());

print(PHP_EOL);

print("Static properties:\n");
var_dump($classReflection->getStaticProperties());
print('Static property someClassVariable value: ' . $classReflection->getStaticPropertyValue('someClassVariable') . PHP_EOL);

print(PHP_EOL);

print("Methods:\n");
var_dump($classReflection->getMethods());
print('Has method someObjectFunction? ' . $classReflection->hasMethod('someObjectFunction') . PHP_EOL);
print("Method someObjectFunction:\n");
var_dump($classReflection->getMethod('someObjectFunction'));

print(PHP_EOL);

print("Constructor:\n");
var_dump($classReflection->getConstructor());

print(PHP_EOL);

print("To string:\n" . $classReflection->__toString() . PHP_EOL);

print(PHP_EOL);

$classReflection->setStaticPropertyValue('someClassVariable', 2048);
print('Static property someClassVariable value: ' . $classReflection->getStaticPropertyValue('someClassVariable') . PHP_EOL);
